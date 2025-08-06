<?php

namespace App\Jobs;

use App\Models\NewsLetter;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNewsletterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $newsletter;

    /**
     * Create a new job instance.
     */
    public function __construct(NewsLetter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $subscribers = NewsletterSubscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::send('emails.newsletter', ['newsletter' => $this->newsletter], function ($message) use ($subscriber) {
                $message->to($subscriber->email);
                $message->subject( $this->newsletter->title );
            });
        }
    }
}
