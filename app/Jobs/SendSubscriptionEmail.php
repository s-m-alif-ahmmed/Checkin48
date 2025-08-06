<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSubscriptionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;

    /**
     * Create a new job instance.
     */
    public function __construct(NewsletterSubscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->subscriber->email;

        // Send email using Mail Facade
        Mail::raw('Thank you for subscribing to our newsletter!', function ($message) use ($email) {
            $message->to($email)
                    ->subject('Newsletter Subscription');
        });
    }
}
