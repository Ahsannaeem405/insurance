<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $type;

    public function __construct($user,$type)
    {
        $this->user=$user;
        $this->type=$type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type==1)
        {
            return $this->from('demo5.browntech@gmail.com')->subject('Subscription')->view('mail.Subscription')->with('user',$this->user);

        }
        if ($this->type==2)
        {
            return $this->from('demo5.browntech@gmail.com')->subject('Invoice Alert')->view('mail.SubscriptionThirteenday')->with('user',$this->user);

        }
        if ($this->type==3)
        {
            return $this->from('demo5.browntech@gmail.com')->subject('Invoice Detail')->view('mail.SubscriptionFourteenday')->with('user',$this->user);

        }
    }
}
