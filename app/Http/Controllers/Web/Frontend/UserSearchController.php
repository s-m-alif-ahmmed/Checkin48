<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSearchController extends Controller
{
    // Amenity wise search
    public function searchByAmenities(Request $request)
    {
        $selectedAmenities = $request->input('amenities', []);

        if (empty($selectedAmenities)) {
            return response()->json([
                'success' => false,
                'message' => __('No amenities selected.'),
            ]);
        }

        $user = auth()->user();

        try {
            // Filter villas based on selected amenities
            $villas = Villa::with('villa_images', 'reviews') // Load related images and reviews
                ->where('status', 'active')
                ->whereHas('amenities', function ($query) use ($selectedAmenities) {
                    // Specify `amenities.id` to avoid ambiguity
                    $query->whereIn('amenities.id', $selectedAmenities);
                })
                ->get();

            // Map through villas and add extra details
            $villasWithImage = $villas->map(function ($villa) use ($user) {
                $imageUrl = $villa->villa_images->first()
                    ? asset($villa->villa_images->first()->image)
                    : asset('frontend/assets/images/blog-1.png');

                $villa->image_url = $imageUrl;
                $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
                $villa->reviews_count = $villa->reviews->count();
                $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
                $villa->property_type = __($villa->property_type);

                return $villa;
            });

            return response()->json([
                'success' => true,
                'villas' => $villasWithImage,
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error in searchByAmenities: ', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => __('Something went wrong. Please try again later.'),
            ]);
        }
    }




    // price was search
    public function searchByPrice(Request $request)
    {
        $minPrice = $request->input('minPrice', 100);
        $maxPrice = $request->input('maxPrice', 100000);

        $user = auth()->user();

        $villas = Villa::whereBetween('price', [$minPrice, $maxPrice])->get();
        // Map through villas and add image URL, average rating, and reviews count
        $villasWithImage = $villas->map(function ($villa) use ($user) {
            // Get the first image URL
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            // Calculate the average rating, default to 0 if no reviews exist
            $averageRating = $villa->reviews->avg('rating') ?? 0;
            $reviewsCount = $villa->reviews->count(); // Get the count of reviews

            // Add the necessary data to the villa
            $villa->image_url = $imageUrl;
            $villa->average_rating = $averageRating;
            $villa->reviews_count = $reviewsCount;
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }


    // Room wise search
    public function searchByRooms(Request $request)
    {
        $request->validate([
            'minRooms' => 'numeric|min:1',
            'maxRooms' => 'numeric|max:100',
        ]);

        if ($request->input('minRooms') > $request->input('maxRooms')) {
            return response()->json([
                'success' => false,
                'message' => __('Minimum rooms cannot be greater than maximum rooms.'),
            ]);
        }

        $minRooms = $request->input('minRooms');
        $maxRooms = $request->input('maxRooms');

        $user = auth()->user();

        $villas = Villa::with('villa_images', 'reviews')
            ->where('status', 'active')
            ->whereBetween('room', [$minRooms, $maxRooms])
            ->get();

        $villasWithImage = $villas->map(function ($villa) use ($user) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
            $villa->reviews_count = $villa->reviews->count();
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }



    // Property type wise search
    public function searchByPropertyType(Request $request)
    {
        $propertyType = $request->input('propertyType');

        $user = auth()->user();

        $villas = Villa::with('villa_images', 'reviews')
            ->where('status', 'active')
            ->where('property_type', $propertyType)
            ->get();

        $villasWithImage = $villas->map(function ($villa) use ($user) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
            $villa->reviews_count = $villa->reviews->count();
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }


    //search by map location
    public function searchByMapLocation(Request $request)
    {
        $location = $request->input('mapLocation', '');

        $user = auth()->user();

        $villas = Villa::with('villa_images', 'reviews')
            ->where('status', 'active')
            ->where('full_address', 'LIKE', "%{$location}%") // Case-insensitive partial match
            ->get();

        $villasWithImage = $villas->map(function ($villa) use ($user) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
            $villa->reviews_count = $villa->reviews->count();
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }
    public function searchByTitle(Request $request)
    {
        $search = $request->input('search', '');

        $user = auth()->user();

        // Fetch villas matching the search query
        $villas = Villa::with('villa_images', 'reviews')
            ->where('status', 'active')
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('full_address', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->orWhere('property_type', 'LIKE', "%{$search}%");
            })
            ->get();

        // Enhance villas with additional data
        $villasWithImage = $villas->map(function ($villa) use ($user) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
            $villa->reviews_count = $villa->reviews->count();
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }


    public function searchByPopularity(Request $request)
    {
        $sortOption = $request->input('sort', 'default');

        $user = auth()->user();

        $villas = Villa::with('villa_images', 'reviews')
            ->where('status', 'active');

        // Apply sorting logic based on selected option
        switch ($sortOption) {
            case 'popular':
                // Sort by average review rating in descending order
                $villas = $villas->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                break;

            case 'newest':
                // Sort by newest villas (created_at descending)
                $villas = $villas->orderBy('created_at', 'desc');
                break;

            case 'oldest':
                // Sort by oldest villas (created_at ascending)
                $villas = $villas->orderBy('created_at', 'asc');
                break;

            default:
                // Default sorting (e.g., by ID or no specific order)
                $villas = $villas->orderBy('id', 'desc');
                break;
        }

        $villas = $villas->get();

        // Add additional information for the response
        $villasWithImage = $villas->map(function ($villa) use ($user) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
            $villa->reviews_count = $villa->reviews->count();
            $villa->isBookmarked = $user ? $user->favourites()->where('villa_id', $villa->id)->exists() : false;
            $villa->property_type = __($villa->property_type);

            return $villa;
        });

        return response()->json([
            'success' => true,
            'villas' => $villasWithImage,
        ]);
    }
}
