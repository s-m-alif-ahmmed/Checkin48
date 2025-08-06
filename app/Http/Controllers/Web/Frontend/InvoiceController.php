<?php

namespace App\Http\Controllers\Web\Frontend;


use App\Models\User;
use App\Models\Booking;
use App\Models\Villa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class InvoiceController extends Controller
{
    public function viewInvoice($id)
    {
        // Retrieve the order and any related data
        $booking = Booking::findOrFail($id);
        $villa_id = Villa::findOrFail($booking->villa_id);
        $villa_owner = Villa::where('user_id', $villa_id->user_id)->first();
        $user = User::findOrFail($villa_owner->user_id);

        // Load the invoice view and pass the data to it
        return view('frontend.layouts.dashboard.layouts.invoice', compact('booking','user'));
    }
}
