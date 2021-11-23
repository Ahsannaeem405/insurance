<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Subsription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Stripe;


class UserController extends Controller
{

    public function buy_now()
    {
        $price=Setting::first();
   return view('Logged_pages.stripe',compact('price'));
    }
    public function buy_now_pay(Request $request)
    {
        $pricing=Setting::first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * $pricing->p_cost,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Insurance Payment"
        ]);


        $user=User::find(\Auth::user()->id);

        $user->register=$user->register+intval($pricing->p_days);
        $user->save();
        $subsription=new Subsription();
        $subsription->user_id=$user->id;
        $subsription->price=$pricing->p_cost;
        $subsription->save();


        return redirect('user/account')->with('success','Plan purchased successfully');

    }
   public function account()
   {

       $setting=Setting::first();

       return view('Logged_pages.profile',compact('setting'));
   }
   public function profile_update(Request $request)

   {
       $user=User::find(\Auth::user()->id);
       $user->name=$request->name;

       if ($request->password != null and $request->old_password) {

           $request->validate([

               'password' => ['required', 'confirmed'],


           ]);


           if (\Hash::check($request->old_password, $user->password)) {
               $user->fill([
                   'password' => Hash::make($request->password)
               ])->save();

           } else {


                   return back()->with('error', 'Password does not match');
           }

       }


       $user->update();

       return back()->with('success','Profile updated successfully');
   }
}
