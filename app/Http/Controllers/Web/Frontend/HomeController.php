<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\Cms;
use App\Models\DynamicPage;
use App\Models\Faq;
use App\Models\PriceType;
use App\Models\Tag;
use App\Models\Tax;
use App\Models\Blog;
use App\Models\Villa;
use App\Models\OurClient;
use Illuminate\View\View;
use App\Models\OurMission;
use App\Models\WhyChooseUs;
use App\Models\WhyBookVilla;
use Illuminate\Http\Request;
use App\Models\ExpertTeamMember;
use App\Models\BenefitsOfJoining;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Display the welcome page.
     *
     * @return View
     */
    public function index(): View
    {
        $faqs = Faq::where('status', 'active')->latest()->get();
        $cms = Cms::where('status', 'active')->get();
        $whyChooseUs = WhyChooseUs::where('status', 'active')->get();
        $whyBookVilla = WhyBookVilla::where('status', 'active')->get();
        $our_latest_blogs = Blog::where('status', 'active')->with('user', 'tags')->latest()->limit(3)->get();
        $villas = Villa::where('status', 'active')
            ->latest()
            ->with(['villa_images', 'reviews'])
            ->paginate(10);

        $reviews = Review::where('status', 'active')->get();

        // Calculate average rating for each villa using a subquery for the reviews
        $villas->getCollection()->each(function ($villa) {
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
        });


        return view('frontend.layouts.pages.home', compact('faqs', 'cms', 'whyChooseUs', 'whyBookVilla', 'our_latest_blogs', 'villas', 'reviews'));
    }

    public function about(): View
    {
        $cms = Cms::where('status', 'active')->get();
        $ourMission = OurMission::where('status', 'active')->first();
        $ourClient = OurClient::where('status', 'active')->get();
        $expertTeamMember = ExpertTeamMember::where('status', 'active')->latest()->limit(4)->get();
        $reviews = Review::where('status', 'active')->get();
        return view('frontend.layouts.pages.about', compact('cms', 'ourMission', 'ourClient', 'expertTeamMember', 'reviews'));
    }

    //vila related all function start
    public function villas(): View
    {
        $cms = Cms::where('status', 'active')->get();
        $our_latest_blogs = Blog::where('status', 'active')
            ->with('user', 'tags')
            ->latest()
            ->limit(3)
            ->get();

        $villas = Villa::where('status', 'active')
            ->latest()
            ->with(['villa_images', 'reviews','amenities'])
            ->paginate(6);

        $villas_count = $villas->count();

        $reviews = Review::where('status', 'active')->get();

        $Amenity = Amenity::where('status', 'active')->latest()->get();

        // Calculate average rating for each villa using a subquery for the reviews
        $villas->getCollection()->each(function ($villa) {
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
        });


        return view('frontend.layouts.pages.villas', compact('cms', 'our_latest_blogs', 'villas', 'reviews','villas_count','Amenity'));
    }


    /* villa detais page start  */

    public function villasDetails($slug): View
    {
        $cms = Cms::where('status', 'active')->get();
        $data = Villa::where('slug', $slug)
            ->where('status', 'active')
            ->with(['villa_images', 'reviews', 'amenities', 'bookings', 'dateOffs'])
            ->firstOrFail();

        $taxes = Tax::where('status', 'active')->get();

        // In your villasDetails controller method
        $selectedRating = request('rating');

        $reviews = Review::where('status', 'active')
            ->where('villa_id', $data->id)
            ->when($selectedRating, function ($query) use ($selectedRating) {
                return $query->where('rating', $selectedRating);
            })
            ->with(['user', 'villa']) // Eager load relationships
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate the average rating villa_id wise
        $averageRating = Review::where('status', 'active')
            ->where('villa_id', $data->id)
            ->avg('rating');

        // Get reviews specific to the villa
        $allReview = Review::where('status', 'active')
            ->where('villa_id', $data->id)
            ->get();

        // Get count of reviews by star rating
        $starCounts = [
            5 => $allReview->where('rating', 5)->count(),
            4 => $allReview->where('rating', 4)->count(),
            3 => $allReview->where('rating', 3)->count(),
            2 => $allReview->where('rating', 2)->count(),
            1 => $allReview->where('rating', 1)->count()
        ];

        // Filter reviews by star rating if requested
        $selectedRating = request('rating');
        if ($selectedRating) {
            $allReview = $allReview->where('rating', $selectedRating);
        }

        $villas = Villa::where('status', 'active')
            ->latest()
            ->with(['villa_images', 'reviews'])
            ->take(3)
            ->get();

        // Calculate average rating for each villa using a subquery for the reviews
        $villas->each(function ($villa) {
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
        });

        $price_types = PriceType::where('status', 'active')
            ->whereIn('id', [
                $data->price_type_id_one,
                $data->price_type_id_two,
                $data->price_type_id_three,
                $data->price_type_id_four
            ])
            ->get();

        return view('frontend.layouts.pages.villa-details', compact('cms', 'data', 'taxes', 'reviews', 'averageRating', 'price_types', 'allReview', 'starCounts', 'villas'));
    }

    /* villa detais page end  */

    public function allVillas(): View
    {
        $cms = Cms::where('status', 'active')->get();
        $Amenity = Amenity::where('status', 'active')->latest()->get();

        $villas = Villa::where('status', 'active')
        ->latest()
        ->with(['villa_images', 'reviews'])
        ->paginate(6);

        // Calculate average rating for each villa using a subquery for the reviews
        $villas->getCollection()->each(function ($villa) {
            $villa->average_rating = $villa->reviews->avg('rating') ?? 0;
        });

        return view('frontend.layouts.pages.all-villas', compact('cms', 'villas', 'Amenity'));
    }

    //vila related all function end


    //blog related all function start
    public function blog(): View
    {
        $cms = Cms::where('status', 'active')->get();
        $blogs = Blog::where('status', 'active')->latest()->paginate(9);
        $reviews = Review::where('status', 'active')->get();
        return view('frontend.layouts.pages.blog', compact('cms', 'blogs', 'reviews'));
    }

    public function blogDetails($slug): View
    {
        $cms = Cms::where('status', 'active')->get();
        $blog = Blog::where('slug', $slug)
            ->where('status', 'active')
            ->with(['user', 'tags'])
            ->firstOrFail();

        // Fetch related blogs based on the tags of the detailed blog
        $related_blogs = Blog::where('blogs.status', 'active')
            ->where('blogs.id', '!=', $blog->id) // Explicit table reference for 'id'
            ->whereHas('tags', function ($query) use ($blog) {
                $query->whereIn('tags.id', $blog->tags->pluck('id')); // Explicit reference for 'id' in tags
            })
            ->take(5) // Limit the number of related blogs
            ->get();

        $tags = Tag::where('status', 'active')->latest()->get();
        $reviews = Review::where('status', 'active')->get();

        return view('frontend.layouts.pages.blog-details', compact('cms', 'blog', 'tags', 'related_blogs', 'reviews'));
    }

    public function blogSearch(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blog::where('title', 'like', '%' . $query . '%')
            ->where('status', 'active')
            ->get(['id', 'title', 'slug', 'image', 'created_at']);

        // Return results as JSON
        return response()->json([
            'success' => true,
            'results' => $blogs
        ]);
    }

    //blog related all function end

    public function loyalty(): View
    {
        $faqs = Faq::where('status', 'active')->latest()->get();
        $cms = Cms::where('status', 'active')->get();
        $benefitsOfJoining = BenefitsOfJoining::where('status', 'active')->first();
        $reviews = Review::where('status', 'active')->get();

        return view('frontend.layouts.pages.loyalty', compact('faqs', 'cms', 'benefitsOfJoining', 'reviews'));
    }

    public function contact(): View
    {
        $faqs = Faq::where('status', 'active')->latest()->get();
        $cms = Cms::where('status', 'active')->get();

        return view('frontend.layouts.pages.contact-us', compact('faqs', 'cms'));
    }

    public function dynamicPages($page_slug): View
    {
        $data = DynamicPage::where('page_slug', $page_slug)->firstOrFail();

        return view('frontend.layouts.pages.dynamic_pages', compact('data'));
    }

}
