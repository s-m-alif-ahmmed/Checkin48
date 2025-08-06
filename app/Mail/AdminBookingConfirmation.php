<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Villa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('New Booking Alert!')
            ->view('frontend.layouts.mail.booking-success-admin')
            ->with([
                'booking' => $this->booking,
                'villa_name' => $this->getVillaTitle(),
            ]);
    }

    private function getVillaTitle()
    {
        $booking_villa_id = $this->booking->villa_id;
        $villa = Villa::where('id', $booking_villa_id)->first();
        return $villa->title;
    }

}
