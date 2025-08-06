<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Villa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
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
        return $this->subject('Thank You for Booking!')
            ->view('frontend.layouts.mail.booking-success-user')
            ->with([
                'booking' => $this->booking,
                'villa_name' => $this->getVillaTitle(),
            ]);
    }

//    private function getVillaTitle()
//    {
//        $villa = $this->booking->villa ?? null;
//
//        // Check if villa exists and has a title
//        if ($villa && isset($villa->title)) {
//            $title = $villa->title;
//
//            // Decode JSON if it's a string
//            if (is_string($title)) {
//                $title = json_decode($title, true);
//            }
//
//            return $title['en'] ?? 'Unknown Villa';
//        }
//
//        return 'Unknown Villa';
//    }

    private function getVillaTitle()
    {
        $booking_villa_id = $this->booking->villa_id;
        $villa = Villa::where('id', $booking_villa_id)->first();
        return $villa->title;
    }

}
