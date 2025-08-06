<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Country;
use App\Models\Villa;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardFrontendController extends Controller
{
    //    User
    public function dashboard()
    {
        $user = Auth::user();
        $bookings = Booking::with('villa.villa_images')->where('user_id', $user->id)->latest()->paginate(10);

        return view('frontend.layouts.dashboard.layouts.index', compact('bookings'));
    }

    public function payment()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->latest()->paginate(10);
        return view('frontend.layouts.dashboard.layouts.payment', compact('bookings'));
    }

    public function loyaltyPoints()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->paginate(10);

        $total_points = $bookings->where('status','approved')->sum('loyalty_point_earn');
        $total_use_points = $bookings->where('status','approved')->sum('loyalty_point_use');
        $total_pending_points = $bookings->where('status','pending')->sum('loyalty_point_earn');
        $user_points = Auth::user()->loyalty_point;

        return view('frontend.layouts.dashboard.layouts.loyalty-points', compact('bookings', 'total_points', 'total_pending_points', 'total_use_points', 'user_points'));
    }

    public function profile()
    {
        $data = Auth::user();
        $countries = Country::where('status', 'active')->get();
        return view('frontend.layouts.dashboard.layouts.profile', compact('data', 'countries'));
    }



    //    Villa Owner
    public function ownerDashboard()
    {
        $villas = Villa::where('user_id', Auth::id())->latest()->paginate(10);
        $total_villas = Villa::where('user_id', Auth::id())->count();
        $total_accept_villas = Villa::where('user_id', Auth::id())->where('status', 'active')->count();

        $Bookings = Booking::whereIn('villa_id', function ($query) {
            $query->select('id')->from('villas')->where('user_id', Auth::id())->where('status', 'active');
        })->latest();

        return view('frontend.layouts.owner-dashboard.layouts.index', compact('villas', 'Bookings','total_villas', 'total_accept_villas'));
    }

    public function ownerBooking()
    {
        $user = Auth::user();

        // Retrieve the villa owned by the authenticated user. Assuming a user can own only one villa.
        $villas = Villa::where('user_id', $user->id)->get();

        // Check if the villa exists
        if (!$villas) {
            return redirect()->back()->with('error', __('No villa found for this user.') );
        }

        // Get all bookings associated with the villas, sorted by the latest and paginated
        $bookings = Booking::whereIn('villa_id', $villas->pluck('id'))->with('user', 'villa')->latest()->paginate(10);

        return view('frontend.layouts.owner-dashboard.layouts.booking', compact('bookings'));
    }

    /* booking status change start */

    public function changeStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Validate the request
        $request->validate([
            'status' => 'required|in:approved,pending,cancelled',
        ]);

        // Get the booking user
        $user = $booking->user;
        if (!$user) {
            return response()->json(['success' => false, 'message' => __('User not found!')], 404);
        }

        // Get loyalty points from the booking
        $booking_loyalty_point_earn = $booking->loyalty_point_earn ?? 0;
        $booking_loyalty_point_use = $booking->loyalty_point_use ?? 0;

        if ($request->status == 'pending') {
            if ($booking->status == 'cancelled') { //done
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_use);
                }
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = $user->loyalty_point ?? 0;
                }
            }elseif ($booking->status == 'approved') {
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = $user->loyalty_point ?? 0;
                }
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_earn);
                }
            }
        } elseif ($request->status == 'cancelled') {
            if ($booking->status == 'approved') { //done
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_earn);
                }
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                }
            }elseif ($booking->status == 'pending') { //done
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = $user->loyalty_point ?? 0;
                }
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                }
            }
        } elseif ($request->status == 'approved') {
            if ($booking->status == 'cancelled') { //done
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_earn);
                }
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_use);
                }
            }elseif ($booking->status == 'pending') {
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_earn);
                }
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = $user->loyalty_point ?? 0;
                }
            }
        }

        $user->save();

        // Update the booking status
        $booking->status = $request->status;
        $booking->save();

        return response()->json(['success' => true, 'message' => __('Status updated successfully!')]);
    }

    /* booking status change end */

    /* booking view  start */
    public function ownerBookingView($id)
    {
        $user = Auth::user();

        // Retrieve the booking by ID
        $booking = Booking::where('id', $id)
            ->whereHas('villa', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with('user', 'villa.villa_images')
            ->first();

        // Check if the booking exists and belongs to the authenticated user's villa
        if (!$booking) {
            return redirect()->route('owner.booking')->with('error', __('Booking not found or you do not have permission to view it.'));
        }

        return view('frontend.layouts.owner-dashboard.layouts.booking-view', compact('booking'));
    }

    /* booking view  end */



    public function ownerPayments()
    {
        $user = Auth::user();

        $villas = Villa::where('user_id', $user->id)->get();

        // Check if the villa exists
        if (!$villas) {
            return redirect()->back()->with('error', __('No villa found for this user.') );
        }

        // Get all bookings associated with the villas, sorted by the latest and paginated
        $bookings = Booking::whereIn('villa_id', $villas->pluck('id'))->with('user')->latest()->paginate(10);

        $withdrawalsRequest = WithdrawRequest::where('user_id', $user->id)->where('status', 'pending')->latest();
        $withdrawalsApproved = WithdrawRequest::where('user_id', $user->id)->where('status', 'approved')->latest();

        $total_subtotal = $bookings->where('status','approved')->sum('subtotal');
        $total_hand_cash = $bookings->where('status','approved')->sum('hand_cash');
        $owner_total = $total_subtotal * 0.85;
        $total_withdraw_request = $withdrawalsRequest->sum('amount');
        $total_withdraw_done = $withdrawalsApproved->sum('amount');
        $total_withdraw = $total_withdraw_request + $total_withdraw_done;
        $total_avalaible_withdraw = ($owner_total - $total_hand_cash) - $total_withdraw;

        return view('frontend.layouts.owner-dashboard.layouts.payments', compact(
            'bookings',
            'withdrawalsRequest',
            'withdrawalsApproved',
            'owner_total',
            'total_subtotal',
            'total_withdraw',
            'total_withdraw_request',
            'total_withdraw_done',
            'total_avalaible_withdraw',
            'total_hand_cash',
        ));
    }


    public function ownerPaymentOption()
    {
        $user = Auth::user();

        $villas = Villa::where('user_id', $user->id)->get();

        // Get all bookings associated with the villas, sorted by the latest and paginated
        $bookings = Booking::whereIn('villa_id', $villas->pluck('id'))->with('user')->latest()->paginate(10);

        $withdrawalsRequest = WithdrawRequest::where('user_id', $user->id)->where('status', 'pending')->latest();
        $withdrawalsApproved = WithdrawRequest::where('user_id', $user->id)->where('status', 'approved')->latest();

        $total_subtotal = $bookings->sum('subtotal');
        $total_hand_cash = $bookings->sum('hand_cash');
        $owner_total = $total_subtotal * 0.85;
        $total_withdraw_request = $withdrawalsRequest->sum('amount');
        $total_withdraw_done = $withdrawalsApproved->sum('amount');
        $total_withdraw = $total_withdraw_request + $total_withdraw_done;
        $total_avalaible_withdraw = ($owner_total - $total_hand_cash) - $total_withdraw;

        return view('frontend.layouts.owner-dashboard.layouts.payment-option', compact(
            'bookings',
            'withdrawalsRequest',
            'withdrawalsApproved',
            'owner_total',
            'total_subtotal',
            'total_withdraw',
            'total_withdraw_request',
            'total_withdraw_done',
            'total_avalaible_withdraw',
            'total_hand_cash',
        ));
    }

    public function ownerProfile()
    {
        $data = Auth::user();
        $countries = Country::where('status', 'active')->get();
        return view('frontend.layouts.owner-dashboard.layouts.profile', compact('data', 'countries'));
    }


    /* villa page search start */
    public function searchVilla(Request $request)
    {
        $query = $request->input('query');

        if (Auth::check()) {
            $bookings = Booking::with('villa.villa_images')
                ->whereHas('villa', function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('full_address', 'like', "%{$query}%");
                })
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $bookings = Booking::with('villa.villa_images')
                ->whereHas('villa', function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('full_address', 'like', "%{$query}%");
                })
                ->get();
        }

        return response()->json([
            'bookings' => $bookings,
        ]);
    }
    /* villa page search end */
}
