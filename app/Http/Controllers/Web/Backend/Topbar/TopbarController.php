<?php

namespace App\Http\Controllers\Web\Backend\Topbar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topbar;

class TopbarController extends Controller
{
    public function index()
    {
       $data = Topbar::first();
        return view('backend.layouts.topbar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone'     => 'nullable|string',
            'email'     => 'nullable|email',
            'status'    => 'nullable|in:active,inactive'
        ]);

        try {
            $item           = Topbar::findOrFail($id);
            $item->phone    = $request->phone;
            $item->email    = $request->email;
            $item->status   = $request->status;
            $item->save();
            return redirect()->route('top-bar.index')->with('t-success', 'Top Bar updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('top-bar.index')->with('t-error', 'Error occurred while updating Top Bar. Please try again.');
        }
    }
}
