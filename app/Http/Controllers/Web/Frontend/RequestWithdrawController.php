<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Villa;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RequestWithdrawController extends Controller
{
    public function requestWithdrawal(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'amount'    => 'required|numeric|min:100',
            ],[
                'amount' => 'Min withdraw amount at least $100.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = Auth::user();

            $villas = Villa::where('user_id', $user->id)->get();

            // Check if the villa exists
            if (!$villas) {
                return redirect()->back()->with('error', 'No villa found for this user.');
            }

            // Get all bookings associated with the villas, sorted by the latest and paginated
            $bookings = Booking::whereIn('villa_id', $villas->pluck('id'))->with('user')->latest()->paginate(10);

            $withdrawalsRequest = WithdrawRequest::where('user_id', $user->id)->where('status', 'pending')->latest();
            $withdrawalsApproved = WithdrawRequest::where('user_id', $user->id)->where('status', 'approved')->latest();

            $total_subtotal = $bookings->sum('subtotal');
            $total_hand_cash = $bookings->sum('hand_cash');
            $owner_total = $total_subtotal * 0.85;
            $total_withdraw_request = $withdrawalsRequest->sum('amount');
            $total_withdraw_done = $withdrawalsApproved->sum('amount');
            $total_withdraw = $total_withdraw_request + $total_withdraw_done ;
            $total_avalaible_withdraw = ($owner_total - $total_hand_cash) - $total_withdraw;

            if ($total_avalaible_withdraw <= $request->amount) {
                return redirect()->back()->with('t-error', __('You cannot withdraw more than your wallet amount.'));
            }

            WithdrawRequest::create([
                'user_id' => $request->user()->id,
                'amount' => $request->amount,
                'status' => 'pending',
            ]);

            return redirect()->route('owner.payment')->with('t-success', __('Withdrawal request submitted successfully.'));

        } catch (\Exception $e) {
            return back()->with('t-error', __('Something went wrong. Please try again later.'));
        }
    }
}
