<?php

namespace App\Http\Controllers\Web\Frontend;


use App\Mail\AdminContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitContactForm(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'whatsapp'  => 'nullable|string',
            'phone'     => 'nullable|string',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        // Fetch only necessary columns for efficiency
        $admins = User::where('role', 'admin')->select('id', 'email')->get();

        if ($admins->isNotEmpty()) {
            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new AdminContact($validatedData));
            }
        }

        // Redirect back with success message
        return back()->with('t-success', __('Your message has been sent to the admin team.') );
    }
}
