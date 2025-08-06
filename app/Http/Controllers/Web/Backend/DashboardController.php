<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Villa;
use App\Models\WithdrawRequest;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();

        if (Auth::check() && $user->role == 'admin') {

            $user = User::all();
            /*For user count start  */
            $newUsers = User::whereYear('created_at', now()->year)->get();
            // Define all months of the year
            $months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            // Group the users by the month they were created
            $userCountsByMonth = array_fill_keys($months, null); // Initialize all months with null (no bar)

            $usersGroupedByMonth = $newUsers->groupBy(function ($user) {
                return $user->created_at->format('F'); // Group by month name
            });

            // Populate the count of users in the correct month
            foreach ($usersGroupedByMonth as $month => $users) {
                $userCountsByMonth[$month] = count($users); // Set actual count where users exist
            }

            // Prepare chart data with usernames and types
            $chartData = [
                'labels' => $months, // Show all months as labels
                'data' => array_values($userCountsByMonth),
                'usernames' => $usersGroupedByMonth->map(function ($users) {
                    return $users->map(fn($user) => [
                        'full_name' => $user->name,
                        'type' => $user->type,
                    ])->all();
                }),
            ];

            /*For user count end  */


            $total_users = User::where('role', 'user')->count();
            $total_villa_users = User::where('role', 'owner')->count();
            $bookings = Booking::whereIn('status', ['pending', 'approved'])->get();
            $reviews = Review::get();
            $villas = Villa::get();
            $blogs = Blog::get();
            $total_amount = $bookings->sum('total_amount');
            $total_hand_cash = $bookings->sum('hand_cash');
            $total_online_payment = $bookings->sum('online_payment');
            $total_loyalty_discount = $bookings->sum('loyalty_point_use');
            $total_tax = $bookings->sum('tax');
            $total_remaining = $total_amount - $total_tax;
            $total_profit = $total_online_payment - $total_tax;
            $total_villa_owner_amount = $total_hand_cash;
            $villa_owner_remaining = $total_hand_cash;
            $total_remaining_profit = $total_profit - $total_loyalty_discount;
            $total_withdraw_request = WithdrawRequest::where('status', 'pending');
            $total_withdraw_request_count = $total_withdraw_request->count(); // Get the count of pending requests
            $total_withdraw_request_amount = $total_withdraw_request->sum('amount'); // Sum the 'amount' of all pending requests


            return view('backend.layouts.dashboard.index',compact(
                'total_users',
                'bookings',
                'reviews',
                'chartData',
                'total_villa_users',
                'blogs',
                'villas',
                'total_tax',
                'total_amount',
                'total_remaining',
                'total_villa_owner_amount',
                'total_profit',
                'total_loyalty_discount',
                'total_remaining_profit',
                'total_withdraw_request_count',
                'total_withdraw_request_amount',
                'total_hand_cash',
                'total_online_payment',
                'villa_owner_remaining',
                'total_online_payment',
            ));
        } elseif (Auth::check() && $user->role == 'user'){
            return redirect()->route('user.dashboard');
        } elseif (Auth::check() && $user->role == 'owner'){
            return redirect()->route('owner.dashboard');
        } else{
            return redirect()->back();
        }
    }

}
