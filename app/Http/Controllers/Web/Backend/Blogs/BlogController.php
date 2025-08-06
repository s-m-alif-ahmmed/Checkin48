<?php

namespace App\Http\Controllers\Web\Backend\Blogs;

use App\Helpers\Helper;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of city content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('user', function ($data) {
                    return $data->user->name ?? 'N/A'; // Handle case when user is null
                })
                ->addColumn('image', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    if ($data->image) {
                        $url = asset($data->image);
                    } else {
                        $url = $defaultImage;
                    }
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('title', function ($data) {
                    return Str::limit($data->title, 30, '...');
                })

                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('blog.show', ['slug' => $data->slug]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-eye"></i>
                                </a>

                                <a href="' . route('blog.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['created_at', 'user', 'image', 'title', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.blog.index');
    }

    // Show the form for creating a new blog
    public function create()
    {
        $users = User::all();
        $tags = Tag::all();
        return view('backend.layouts.blog.create', compact('users', 'tags'));
    }

    // Store a newly created blog
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|array',
            'title.en'    => 'required|required_with:title.ar|string',
            'title.ar'    => 'required|required_with:title.en|string',

            'slug' => 'nullable|string|unique:blogs,slug',

            'description'    => 'nullable|array',
            'description.en' => 'required|required_with:description.ar|string',
            'description.ar' => 'required|required_with:description.en|string',


            'body'      => 'nullable|array',
            'body.en'   => 'required|required_with:body.ar|string',
            'body.ar'   => 'required|required_with:body.en|string',

            'image' => 'nullable|image|max:10485760',
            'status' => 'required|in:active,inactive',
            'tags' => 'required|array', // Validate tags as an array
            'tags.*' => 'exists:tags,id', // Ensure each tag exists in the tags table
        ]);

        // Store the image using the FileUpload helper
        $image = Helper::fileUpload($request->image, 'Blogs', time() . '_' . $request->file('image')->getClientOriginalName());

        // Generate slug if not provided
        if (empty($request->slug)) {
            $request->merge(['slug' => Str::slug($request->title["en"].'-'.rand(1, 100000) )]);
        }

        // Create the blog
        $blog = new Blog();
        $blog->user_id = auth()->id(); // Automatically set the logged-in user ID
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->body = $request->body;
        $blog->image = $image ?? null;
        $blog->status = $request->status;

        $blog->save();

        // Attach tags to the blog
        $blog->tags()->attach($request->tags);

        return redirect()->route('blog.index')->with('t-success', 'Blog created successfully.');
    }

    // Show the form for editing a blog
    public function show($slug)
    {
        $data = Blog::where('slug', $slug)->firstOrFail(); // Find the blog by slug
        $tags = Tag::all();
        return view('backend.layouts.blog.detail', compact('data', 'tags'));
    }

    // Show the form for editing a blog
    public function edit($id)
    {
        $blog = Blog::find($id); // Find the blog by slug
        $tags = Tag::all(); // Fetch all tags
        return view('backend.layouts.blog.edit', compact('blog',  'tags'));
    }

    // Update the specified blog
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'title'     => 'nullable|array',
                'title.en'  => 'nullable|required_with:title.ar|string|max:255',
                'title.ar'  => 'nullable|required_with:title.en|string|max:255',

                'slug'           => 'nullable|string', // Exclude current blog ID from uniqueness check
                'description'    => 'nullable|array',
                'description.en' => 'nullable|required_with:description.ar|string|max:255',
                'description.ar' => 'nullable|required_with:description.en|string|max:255',

                'body'      => 'nullable|array',
                'body.en'   => 'nullable|required_with:body.ar|string|max:255',
                'body.ar'   => 'nullable|required_with:body.en|string|max:255',

                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status'    => 'required|in:active,inactive',
                'tags'      => 'required|array', // Validate tags as an array
                'tags.*' => 'exists:tags,id', // Ensure each tag exists
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Fetch the existing blog
            $data = Blog::findOrFail($id);

            // Generate a unique slug
            $newSlug = $request->slug ?: Str::slug($request->title["en"], '-');
            if (Blog::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                $newSlug .= '-' . Str::random(5);
            }

            // Update the blog attributes
            $data->user_id = auth()->id();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->slug = $newSlug;
            $data->body = $request->body;
            $data->status = $request->status;

            // Handle the image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($data->image) {
                    Helper::fileDelete($data->image);
                }

                // Upload the new image
                $data->image = Helper::fileUpload($request->file('image'), 'Blogs', time() . '_' . $request->file('image')->getClientOriginalName());
            }

            $data->save();

            // Update tags
            $data->tags()->sync($request->tags);

            return redirect()->route('blog.index')->with('t-success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Change the status of the specified city content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = Blog::findOrFail($id);
        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }

    /**
     * Remove the specified city content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = Blog::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Blog deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the blog.',
            ]);
        }
    }
}
