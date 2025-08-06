<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Villa;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'villa_id' => 'required|exists:villas,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $userId = auth()->id();
        $villaId = $request->villa_id;

        // Check if the user has already reviewed this villa
        $existingReview = Review::where('user_id', $userId)->where('villa_id', $villaId)->first();

        if ($existingReview) {
            return redirect()->back()->with('t-error', __('You have already reviewed this villa.'));
        }

        // Create a new review
        Review::create([
            'user_id' => $userId,
            'villa_id' => $villaId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('t-success', __('Your review has been submitted successfully!'));
    }

    // ReviewController.php
    public function filterReviews(Request $request, $villaSlug)
    {
        // Get the villa from the slug
        $villa = Villa::where('slug', $villaSlug)->where('status', 'active')->firstOrFail();

        // Get the rating filter from the request
        $rating = $request->input('rating');

        // Get the reviews for the specific villa
        $reviews = Review::with(['user', 'villa'])
            ->where('villa_id', $villa->id)
            ->where('status', 'active');

        // If rating is provided, filter reviews by rating
        if ($rating) {
            $reviews->where('rating', $rating);
        }

        // Return the filtered reviews as JSON
        return response()->json([
            'reviews' => $reviews->latest()->get()
        ]);
    }

}
