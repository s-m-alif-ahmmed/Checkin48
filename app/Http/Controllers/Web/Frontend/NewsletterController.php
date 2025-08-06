<?php

namespace App\Http\Controllers\Web\Frontend;

use Illuminate\Http\Request;
use App\Jobs\SendSubscriptionEmail;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Database\QueryException;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        try {
            // Save email to the database
            $subscriber = NewsletterSubscriber::create([
                'email' => $request->email,
            ]);

            // Dispatch email job
            SendSubscriptionEmail::dispatch($subscriber);

            return back()->with('t-success', __('Thank you for subscribing to our newsletter!'));
        } catch (QueryException $e) {
            return back()->with('t-error', __('This Email Already Exists!'));
        }
    }
}
