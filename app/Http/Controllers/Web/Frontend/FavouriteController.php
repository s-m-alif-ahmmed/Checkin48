<?php

namespace App\Http\Controllers\Web\Frontend;


use App\Models\Favourite;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function bookmarkPost(Request $request, $id)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => __('You must be logged in to bookmark a villa.')
                ], 401);
            }

            $villa = Villa::findOrFail($id);

            // Check if the villa is already bookmarked
            $favourite = Favourite::where('user_id', $user->id)->where('villa_id', $villa->id)->first();

            if ($favourite) {
                // Remove bookmark
                $user->favourites()->detach($villa->id);
                return response()->json([
                    'success' => true,
                    'action' => 'removed',
                    'is_bookmarked' => false,
                    'message' => __('Villa removed from bookmarks.')
                ]);
            } else {
                // Add to bookmarks
                $user->favourites()->attach($villa->id, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                return response()->json([
                    'success' => true,
                    'action' => 'added',
                    'is_bookmarked' => true,
                    'message' => __('Villa added to bookmarks.')
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('An error occurred: ') . $e->getMessage()
            ], 500);
        }
    }



    public function bookmarkList()
    {
        $userId = Auth::user()->id;

        $favourites = Favourite::with('villa')
            ->where('user_id', $userId)
            ->paginate(10);

        return view('frontend.layouts.dashboard.layouts.bookmark_list', compact('favourites', 'userId'));
    }

    public function removeBookmark($id)
    {
        try {
            $favourite = Favourite::findOrFail($id);
            $favourite->delete();

            // Return success response as JSON
            return response()->json([
                'success' => true,
                't-success' => __('Bookmark removed successfully!'),
            ]);
        } catch (\Exception $e) {
            // Return error response as JSON
            return response()->json([
                'success' => false,
                't-error' => __('An error occurred while removing the bookmark.'),
            ]);
        }
    }


}
