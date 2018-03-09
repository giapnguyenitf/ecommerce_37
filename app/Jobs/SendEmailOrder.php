<?php

namespace App\Jobs;

use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $order;
    protected $orderDetails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $order, $order_details)
    {
        $this->user = $user;
        $this->order = $order;
        $this->orderDetails = $order_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('admin.mailOrderSuccess', ['user' => $this->user, 'order' => $this->order, 'order_details' => $this->orderDetails], function ($message) {
            $message->to($this->user->email, trans('label.email.u-stora'))->subject(trans('label.mail.confirm_order'));
        });
    }
}
