<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionAlert;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function testing()
    {
        $pricing = Setting::first();

        $users = \App\Models\User::where('payment_status', 'pending')->get();
        foreach ($users as $user) {
            //  dd($user);
            $date = Carbon::parse($user->created_at)->format('Y-m-d');
            $fourteendays = Carbon::createFromFormat('Y-m-d', $date)->addDay(14);
            $thirteendays = Carbon::createFromFormat('Y-m-d', $date)->addDay(13);

            $today = Carbon::createFromFormat('Y-m-d', Carbon::parse(Carbon::now())->format('Y-m-d'));


            if ($today->eq("$thirteendays")) {
                $type=2;
                \Mail::to($user->email)->send(new SubscriptionAlert($user,$type));

            } elseif ($today->eq("$fourteendays")) {

                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                $stripe->charges->capture("$user->capture_id", []);

                $user->payment_status='completed';
                $user->register=$user->register+ intval($pricing->p_days);
                $user->update();
                $type=3;
                \Mail::to($user->email)->send(new SubscriptionAlert($user,$type));

            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
