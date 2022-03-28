<?php

namespace App\Console\Commands;

use App\Mail\SubscriptionAlert;
use App\Models\Setting;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Console\Command;

class Subscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Subscription:setting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
}
