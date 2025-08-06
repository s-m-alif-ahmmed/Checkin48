<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingConfirmation;
use App\Mail\BookingConfirmation;
use App\Mail\OwnerBookingConfirmation;
use App\Models\Booking;
use App\Models\Cms;
use App\Models\PriceType;
use App\Models\Tax;
use App\Models\User;
use App\Models\UserStatement;
use App\Models\Villa;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BookingController extends Controller
{

    public function BookingDetails($id)
    {
        $booking = Booking::findOrFail($id);
        return view('frontend.booking.booking-details',compact('booking'));
    }

    public function villaCartSession(Request $request): RedirectResponse | JsonResponse
    {
        // Validate the input data to ensure all fields are provided
        $validator = Validator::make($request->all(), [
            'price_type_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'people' => 'required|string',
        ], [
            'check_in.required' => __('Check-in date is required.'),
            'check_out.required' => __('Check-out date is required.'),
            'people.required' => __('The number of people is required.'),
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Pass validation errors back to the view and keep the old input
            return redirect()->back()
                ->with('t-error', __('Something went wrong'))
                ->withInput();
        }

        try {
            // Extract counts for specific categories
            $peopleString = $request->people;

            // Initialize counts
            $guestCount = 0;
            $infantCount = 0;

            // Match categories explicitly
            preg_match('/(\d+)\s+guests/', $peopleString, $guestMatch);
            preg_match('/(\d+)\s+infants/', $peopleString, $infantMatch);

            // Parse the counts
            if (!empty($guestMatch[1])) {
                $guestCount = intval($guestMatch[1]);
            }

            if (!empty($infantMatch[1])) {
                $infantCount = intval($infantMatch[1]);
            }

            // Calculate total excluding
            $totalPeople = $guestCount + $infantCount;

            $created_at = Carbon::now()->toISOString();

            // Ensure the check_in and check_out dates are valid before proceeding
            $checkIn = Carbon::parse($request->check_in);
            $checkOut = Carbon::parse($request->check_out);

            // Ensure that check_out is later than check_in
            if ($checkIn->greaterThanOrEqualTo($checkOut)) {
                return response()->json([
                    'success' => false,
                    't-error' => __('Check-out date must be after the check-in date.'),
                ], 422);
            }

            // Calculate number of nights
            $nights = $checkIn->diffInDays($checkOut);
            if ($nights == 0) {
                $nights = 1; // At least 1 day should be considered
            }

            // Retrieve the villa based on the slug (passed via request)
            $villa = Villa::findOrFail($request->villa_id);
            $tax = Tax::where('status', 'active')->first();
            $villa_payment_option = $villa->payment_option;

            $selected_type = $request->price_type_id;
            $price = 0;

            if ($villa->price_type_id_one == $selected_type) {
                $price = $villa->price;
            }elseif ($villa->price_type_id_two == $selected_type){
                $price = $villa->price_two;
            }elseif ($villa->price_type_id_three == $selected_type){
                $price = $villa->price_three;
            }elseif ($villa->price_type_id_four == $selected_type){
                $price = $villa->price_four;
            }

            // Calculate the pricing
            $subtotal = $price * $nights;
            $loyalty_point_earn = $subtotal * 0.05;
            $taxPercent = $tax->tax; // Example tax rate (replace with actual logic if needed)
            $taxAmount = round($subtotal * ($taxPercent / 100), 2); // Rounded to 2 decimal places
            $total = round($subtotal + $taxAmount, 2); // Rounded to 2 decimal places

            if ($villa_payment_option === 0){
                $hand_cash = $subtotal * 0.85;
                $online_payment = $total - $hand_cash;
            }elseif($villa_payment_option === 1){
                $hand_cash = 0;
                $online_payment = $total;
            }

            // Store the form data and pricing information in session
            Session::put('cart', [
                'user_id' => Auth::user()->id,
                'villa_id' => $villa->id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'guests' => $request->people,
                'guestCount' => $guestCount,
                'infantCount' => $infantCount,
                'totalPeople' => $totalPeople,
                'loyalty_point_earn' => $loyalty_point_earn,
                'days' => $nights,
                'price_type_id' => $selected_type,
                'subtotal' => round($subtotal, 2), // Rounded to 2 decimal places
                'tax_percent' => $taxPercent,
                'tax' => $taxAmount,
                'total' => $total,
                'hand_cash' => $hand_cash ?? 0,
                'online_payment' => $online_payment ?? 0,
                'created_at' => $created_at,
            ]);

            // Redirect to checkout page
            return redirect()->route('villa.checkout');

        } catch (\Exception $e) {
            // If an exception occurs, catch it and return the error message
            return redirect()->back()->withErrors('t-error', __('Something went wrong. Please try again.'), $validator)->withInput();
        }
    }

    public function villaCheckout(): RedirectResponse | View
    {
        try {
            // Retrieve session data
            $cart = Session::get('cart');

            // If session data is not available, redirect to the villa list page or default page with an error message
            if (!$cart) {
                return redirect()->route('all.villas')->with('t-error', __('Villa not added to cart'));
            }

            // Get session values
            $checkIn = $cart['check_in'];
            $checkOut = $cart['check_out'];
            $guests = $cart['guests'];
            $guestCount = $cart['guestCount'];
            $infantCount = $cart['infantCount'];
            $totalPeople = $cart['totalPeople'];
            $days = $cart['days'];
            $price_type_id = $cart['price_type_id'];
            $subtotal = $cart['subtotal'];
            $loyalty_point_earn = $cart['loyalty_point_earn'];
            $taxPercent = $cart['tax_percent'];
            $tax = $cart['tax'];
            $total = $cart['total'];
            $villa_id = $cart['villa_id'];
            $hand_cash = $cart['hand_cash'];
            $online_payment = $cart['online_payment'];
            $created_at = $cart['created_at'];


            // Get villa details
            $cms = Cms::where('status', 'active')->get();
            $data = Villa::where('id', $villa_id)
                ->where('status', 'active')
                ->with(['reviews', 'amenities'])
                ->firstOrFail();

            $user_statements = UserStatement::where('status', 'active')->get();

            $average_rating = $data->reviews->avg('rating') ?? 0;
            $rating_count = $data->reviews->count();

            // Proceed to the checkout page with the retrieved data
            return view('frontend.layouts.pages.villa-checkout', compact(
                'cms',
                'data',
                'checkIn',
                'checkOut',
                'guests',
                'days',
                'price_type_id',
                'subtotal',
                'created_at',
                'tax',
                'guestCount',
                'infantCount',
                'totalPeople',
                'taxPercent',
                'total',
                'average_rating',
                'rating_count',
                'hand_cash',
                'online_payment',
                'loyalty_point_earn',
                'user_statements',
            ));

        } catch (Exception $e) {
            // Catch any exceptions and log the error for debugging
            Log::error('Error in villaCheckout: ' . $e->getMessage());

            // Return an error message if something went wrong
            return redirect()->route('villa.index')->with('t-error', __('Something went wrong. Please try again later.') );
        }
    }

    public function removeCartSession()
    {
        // Remove the cart session
        Session::forget('cart');
        Session::forget('discount');

        return response()->json(['success' => true, 't-success' => __('Cart session removed successfully.')]);
    }

    public function checkAndRedeemLoyaltyPoints(Request $request)
    {
        try {
            // Get the authenticated user
            $user = Auth::user();

            // Get the points requested for redemption
            $pointsRequested = (int) $request->input('points');
            $subtotal = (float) $request->input('subtotal');
            $tax = (float) $request->input('tax');
            $payment_option = (int) $request->input('villa_payment_option');  // Correctly retrieve the payment_option value

            // Check if the user has enough loyalty points
            if ($user->loyalty_point < $pointsRequested) {
                return response()->json([
                    'success' => false,
                    'message' => __('You do not have enough loyalty points.')
                ]);
            }

            // Initialize hand_cash and online_payment
            $hand_cash = 0;

            // Handle calculation based on payment_option
            if ($payment_option == 0) {
                $save_amount = $pointsRequested;
                $hand_cash = $subtotal * 0.85;  // 85% of the subtotal
                $total = $subtotal + $tax;
                $online_pay = $total - $hand_cash;  // Remaining amount after hand_cash

                // Check if the user has enough loyalty points
                if ($online_pay < $pointsRequested) {
                    return response()->json([
                        'success' => false,
                        'message' => __('You could not use loyalty points more then online payment.')
                    ]);
                }

                // Subtract the loyalty points from the online payment
                $online_payment = $online_pay - $pointsRequested;  // Ensure online payment doesn't go negative
            } else {
                $total = $subtotal + $tax;  // For other payment_option types
                $online_payment = $total;
                $save_amount = $pointsRequested;

                // Check if the user has enough loyalty points
                if ($online_payment < $pointsRequested) {
                    return response()->json([
                        'success' => false,
                        'message' => __('You could not use loyalty points more then online payment.')
                    ]);
                }
            }

            // Calculate loyalty discount and apply it to the subtotal
            $loyalty_discount = $pointsRequested; // Assuming 1 point = $1
            $newSubtotal = $subtotal - $loyalty_discount; // Prevent negative subtotal

            // Calculate the new total (after applying the loyalty points)
            $newTotal = $newSubtotal + $tax; // Assuming tax is calculated on the new subtotal

            // Store the new subtotal and loyalty discount in the session (discount session)
            session([
                'discount' => [
                    'subtotal' => $newSubtotal,
                    'loyalty_discount' => $loyalty_discount,
                    'new_total' => $newTotal,
                    'loyalty_point' => $pointsRequested,
                    'hand_cash' => $hand_cash,
                    'online_payment' => $online_payment,
                    'save_amount' => $save_amount,
                ]
            ]);

            // Return the new total, loyalty discount, and other necessary data
            return response()->json([
                'success' => true,
                'new_total' => $newTotal,
                'loyalty_discount' => $loyalty_discount,
                'online_payment' => $online_payment,
                'hand_cash' => $hand_cash,
                'save_amount' => $save_amount,
            ]);
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Loyalty points redemption error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => __('Something went wrong. Please try again later.')
            ]);
        }
    }

    public function removeLoyaltyPoints()
    {
        // Remove the cart session for the discount
        Session::forget('discount');

        return response()->json([
            'success' => true,
            't-success' => __('Loyalty point removed successfully.')
        ]);
    }

    public function bookingStore(Request $request): RedirectResponse
    {
        try {
            // Validate request
            $request->validate([
                'name' => 'required|string',
                'country' => 'required',
                'email' => 'required',
                'number' => 'required',

                'user_statement_id'    => 'required', // Ensure it's an array and at least one is selected
                'user_statement_id.*'  => 'exists:user_statements,id', // Ensure each ID exists in the `owner_statements` table
            ]);

            // Retrieve session data
            $cart = Session::get('cart');

            // If session data is not available, redirect to the previous page or a default page
            if (!$cart) {
                return redirect()->back()->with('t-error', __('Villa not added'));
            }

            // Get session values
            $checkIn = $cart['check_in'];
            $checkOut = $cart['check_out'];
            $guests = $cart['guests'];
            $totalPeople = $cart['totalPeople'];
            $days = $cart['days'];
            $price_type_id = $cart['price_type_id'];
            $subtotal = $cart['subtotal'];
            $loyalty_point_earn = $cart['loyalty_point_earn'];
            $taxPercent = $cart['tax_percent'];
            $tax = $cart['tax'];
            $total = $cart['total'];
            $villa_id = $cart['villa_id'];
            $cart_hand_cash = $cart['hand_cash'];
            $cart_online_payment = $cart['online_payment'];

            $villa = Villa::findOrFail($villa_id);
            $villa_day_price = 0;

            if ($villa->price_type_id_one == $price_type_id) {
                $villa_day_price = $villa->price;
            }elseif ($villa->price_type_id_two == $price_type_id){
                $villa_day_price = $villa->price_two;
            }elseif ($villa->price_type_id_three == $price_type_id){
                $villa_day_price = $villa->price_three;
            }elseif ($villa->price_type_id_four == $price_type_id){
                $villa_day_price = $villa->price_four;
            }

            // Generate a unique booking_id
            do {
                $booking_id = str_pad(mt_rand(1000000000, 9999999999), 10, '0', STR_PAD_LEFT); // Ensures a 10-digit number
            } while (Booking::where('booking_id', $booking_id)->exists()); // Check if the booking_id is unique

            // Retrieve session data

            // Retrieve session discount data
            $discount = Session::get('discount', []);
            $total = $discount['new_total'] ?? $total;
            $loyalty_discount = $discount['loyalty_discount'] ?? 0;
            $loyalty_point = $discount['loyalty_point'] ?? 0;
            $hand_cash = $discount['hand_cash'] ?? $cart_hand_cash;
            $online_payment = $discount['online_payment'] ?? $cart_online_payment;

            // Calculate loyalty points as 5% of the subtotal
            $loyalty_earn = $loyalty_point_earn;

            // Create a new booking
            $booking = new Booking();
            $booking->user_id = Auth::user()->id ?? null;
            $booking->villa_id = $villa_id;
            $booking->booking_id = $booking_id;
            $booking->country = $request->country;
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->number = $request->number;
            $booking->people = $guests;
            $booking->check_in_date = $checkIn;
            $booking->check_out_date = $checkOut;
            $booking->guest_count = $totalPeople;
            $booking->nights = $days;
            $booking->price_type_id = $price_type_id;
            $booking->villa_day_price = $villa_day_price;
            $booking->tax_percent = $taxPercent;
            if ($loyalty_discount > 0){
                $booking->loyalty_point_earn = 0;
            }else{
                $booking->loyalty_point_earn = $loyalty_earn;
            }
            $booking->loyalty_point_use = $loyalty_discount;
            $booking->tax = $tax;
            $booking->subtotal = $subtotal;
            $booking->total_amount = $total;
            $booking->hand_cash = $hand_cash ?? 0;
            $booking->online_payment = $online_payment ?? 0;
            $booking->payment_option = $villa->payment_option;
            $booking->payment_status = 'unpaid';

            // Save the booking
            if ($booking->save()) {

                // Attach statement
                if ($request->filled('user_statement_id')) {
                    $booking->userStatements()->attach($request->user_statement_id);
                }

                // Update the user's loyalty points
                $user = Auth::user();
                if ($booking->loyalty_point_use > 0){
                    $user->loyalty_point = ($user->loyalty_point ?? 0) - $booking->loyalty_point_use;
                }

                $user->save();

                // Store booking details in session for later use in modal
                Session::put('booking', [
                    'user_id' => Auth::user()->id,
                    'booking_id' => $booking->booking_id,
                    'loyalty_point_earn' => round($booking->loyalty_point_earn),
                ]);

                $admins = User::where('role', 'admin')->select('id', 'email')->get();
                $villaOwner = $villa->user;

                // Send the email notification to the user
                Mail::to($booking->email)->send(new BookingConfirmation($booking));
                Mail::to($villaOwner->email)->send(new OwnerBookingConfirmation($booking));

                if ($admins->isNotEmpty()) {
                    foreach ($admins as $admin) {
                        Mail::to($admin->email)->send(new AdminBookingConfirmation($booking));
                    }
                }

                // If booking is saved successfully, remove the cart session
                $this->removeCartSession();

                return redirect()->route('home')->with('t-complete', __('Booking Complete!'));
            } else {
                // If booking saving fails
                return redirect()->back()->with('t-error', __('Booking failed. Please try again.'));
            }

        } catch (Exception $e) {
            // Catch any exceptions and log the error
            Log::error('Booking store error: ' . $e->getMessage());
            return redirect()->back()->with('t-error', __('Something went wrong. Please try again later.'));
        }
    }

}
