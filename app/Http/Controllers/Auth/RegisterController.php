<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionAlert;
use App\Models\Setting;
use App\Models\Subsription;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stripe;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     *
     */
    protected function redirectTo()
    {


        if (auth()->user()->role == 'user') {

            return '/user/fex';
        } elseif (auth()->user()->role == 'admin') {
            return '/admin/index';
        }


        return redirect()->back()->withError('whoops! You are not authorized to visit this link.');

    }


    public function showRegistrationForm()
    {

        $price = Setting::first();
        return view('auth.register', compact('price'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function registeruser(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'about' => ['required'],
        ]);
        $pricing = Setting::first();
        $hold=null;
        if (floatval($request->f_price) != 0) {
            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $hold = Stripe\Charge::create([
                    "amount" => 100 * floatval($request->f_price),
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Insurance Payment",
                    'capture' => false, //for hold amount
                ]);
            }
            catch (\Exception $exception){
                return  back()->with('error',$exception->getMessage());
            }


        }
       // dd($hold);

        $user = new User();
        $user->name = $request->f_name . ' ' . $request->l_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->about = $request->about;
        $user->refral_id = $request->refral;
        $user->capture_id=$hold!=null ? $hold->id : null;
        $user->payment_status=$hold!=null ? 'pending' : 'completed';
        $user->role = 'user';
        if (floatval($request->f_price) == 0) {
            $user->register = 14 + intval($pricing->p_days);
        } else {
            $user->register = 14;
        }
        $user->save();

        if (intval($request->refral) != 0) {
            $user = User::find(intVal($request->refral));
            $user->register = $user->register + 30;
            $user->update();

        }


        $subsription = new Subsription();
        $subsription->user_id = $user->id;
        $subsription->price = $pricing->p_cost;
        $subsription->save();

        \Auth::login($user);

        if($user->capture_id!=null)
        {
            $type=1;
            \Mail::to($user->email)->send(new SubscriptionAlert($user,$type));
        }

        return redirect('user/fex')->with('success', 'Register Successfully!');


    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'about' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
