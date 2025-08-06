<?php

namespace App\Http\Controllers\Web\Frontend\Owner;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OwnerSearchController extends Controller
{
    public function ownerSearchVilla(Request $request)
    {
        $query = $request->input('query');

        // Fetch villas for the current owner with images
        $villas = Villa::with('villa_images')
            ->where('user_id', auth()->id())
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->get();

        // Map through the villas and include the first image URL
        $villasWithImage = $villas->map(function ($villa) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            return $villa;
        });

        // Return the villas along with image URLs
        return response()->json([
            'villas' => $villasWithImage,
        ]);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Fetch villas for the current owner with images
        $villas = Villa::with('villa_images')
            ->where('user_id', auth()->id())
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->get();

        // Map through the villas and include the first image URL
        $villasWithImage = $villas->map(function ($villa) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->posting_date = $villa->created_at->format('M d, Y');
            return $villa;
        });

        // Return the villas along with image URLs
        return response()->json([
            'villas' => $villasWithImage,
        ]);
    }


    public function searchStatus(Request $request)
    {
        $status = $request->input('status');

        // Fetch villas for the current owner based on the status
        $villas = Villa::with('villa_images')
            ->where('user_id', auth()->id())
            ->where('status', $status) // Filter by status
            ->get();

        $villasWithImage = $villas->map(function ($villa) {
            $imageUrl = $villa->villa_images->first()
                ? asset($villa->villa_images->first()->image)
                : asset('frontend/assets/images/blog-1.png');

            $villa->image_url = $imageUrl;
            $villa->posting_date = $villa->created_at->format('M d, Y');
            return $villa;
        });

        return response()->json([
            'villas' => $villasWithImage,
        ]);
    }
}
