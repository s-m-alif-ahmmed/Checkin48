<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Cms;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VillaSearchController extends Controller
{

    public function villaSearch(Request $request): View
    {
         $cms = Cms::where('status', 'active')->get();
         $Amenity = Amenity::where('status', 'active')->latest()->get();

         $blogs = Blog::where('status', 'active')->latest()->get();

         $query = Villa::where('status', 'active')->with(['villa_images', 'reviews']);

         // Apply filters
         if ($request->filled('location')) {
             $query->where(function($query) use ($request) {
                 $query->where('full_address', 'like', '%' . $request->location . '%');
             });
         }

         if ($request->filled('checkIn') && $request->filled('checkOut')) {
             $bookedVillas = Booking::where(function($query) use ($request) {
                 $query->where('check_in_date', '<=', $request->checkOut)
                       ->where('check_out_date', '>=', $request->checkIn);
             })->pluck('villa_id');

             $query->whereNotIn('id', $bookedVillas);
         }

         if ($request->filled('people')) {
             $query->where('adults', '>=', $request->people);
         }

         // Add other filters here as needed (e.g., pets, children)
         $villas = $query->latest()->paginate(12);

         return view('frontend.layouts.pages.villa-search', compact('cms', 'blogs', 'villas', 'Amenity'));
    }
}
