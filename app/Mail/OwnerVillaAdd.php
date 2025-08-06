<?php

namespace App\Mail;

use App\Models\Villa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OwnerVillaAdd extends Mailable
{
    use Queueable, SerializesModels;

    public $villa;

    /**
     * Create a new message instance.
     */
    public function __construct(Villa $villa)
    {
        $this->villa = $villa;
    }

    public function build()
    {
        return $this->subject('Your Villa Has Been Created')
            ->view('frontend.layouts.mail.add-villa-owner')
            ->with([
                'villa' => [
                    'title' => $this->decodeJson($this->villa->title, 'en'),
                    'full_address' => $this->decodeJson($this->villa->full_address, 'en'),
                    'description' => $this->decodeJson($this->villa->description, 'en'),
                ]
            ]);

    }

    private function decodeJson($json, $key)
    {
        if (is_array($json)) {
            return $json[$key] ?? 'N/A';
        }

        $decoded = json_decode($json, true);

        return is_array($decoded) ? ($decoded[$key] ?? 'N/A') : 'N/A';
    }
}
