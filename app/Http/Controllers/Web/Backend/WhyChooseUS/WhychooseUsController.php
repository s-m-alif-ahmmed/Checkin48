<?php

namespace App\Http\Controllers\Web\Backend\WhyChooseUS;


use App\Helpers\Helper;
use App\Models\WhyChooseUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class WhychooseUsController extends Controller
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
            $data = WhyChooseUs::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($data) {
                    $title = $data->title;
                    return $title;
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
                ->addColumn('description', function ($data) {
                    $description = $data->description;
                    return $description;
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
                                <a href="' . route('why-choose-us.edit', ['slug' => $data->slug]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['title', 'image', 'description', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.why-choose.index');
    }

    //create
    public function create()
    {
        return view('backend.layouts.why-choose.create');
    }

    //store
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title'         => 'required|array',
            'title.en'          => 'required|required_with:title.ar|string|max:255',
            'title.ar'          => 'required|required_with:title.en|string|max:255',

            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',

            'description'   => 'required|array',
            'description.en'          => 'required|required_with:description.ar|string|max:255',
            'description.ar'          => 'required|required_with:description.en|string|max:255',

            'status'        => 'required|in:active,inactive',
        ]);

        try {
            // Generate a slug from the title
            $slug = Str::slug($request->title["en"]);

            // Check if the slug already exists (optional for uniqueness)
            $existingSlug = WhyChooseUs::where('slug', $slug)->exists();

            if ($existingSlug) {
                $slug .= '-' . Str::random(5); // Append random characters to ensure uniqueness
            }

            if (!$slug){
                $slug .= Str::random(10);
            }

            $data                   = new WhyChooseUs();
            $data->title            = $request->title;
            $data->description      = $request->description;
            $data->status           = $request->status;

            if ($request->hasFile('image')) {
                $imagePath = Helper::fileUpload($request->file('image'), 'WhyChooseUs', time() . '_' . $request->file('image')->getClientOriginalName());
                if ($imagePath !== null) {
                    $data->image = $imagePath;
                }
            }

            $data->slug             = $slug;
            $data->save();

            // Redirect or return a response
            return redirect()->route('why-choose-us.index')->with('t-success', 'Data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong!');
        }
    }

    //status update
    public function status(int $id): JsonResponse
    {
        $data = WhyChooseUs::findOrFail($id);
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

    //edit
    public function edit($slug)
    {
        // Find the record by slug
        $item = WhyChooseUs::where('slug', $slug)->first();

        if (!$item) {
            return redirect()->route('why-choose-us.index')->with('error', 'Record not found.');
        }

        // Pass the item to the edit view
        return view('backend.layouts.why-choose.edit', compact('item'));
    }

    //update
    public function update(Request $request, $slug)
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'title'              => 'nullable|array',
                'title.en'           => 'nullable|required_with:title.ar|string|max:255',
                'title.ar'           => 'nullable|required_with:title.en|string|max:255',
                'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'description'        => 'nullable|array',
                'description.en'     => 'nullable|required_with:description.ar|string|max:255',
                'description.ar'     => 'nullable|required_with:description.en|string|max:255',
                'status'             => 'required|in:active,inactive',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Fetch the existing data using slug
            $data = WhyChooseUs::where('slug', $slug)->firstOrFail();

            // Generate a unique slug if the title changes
            $newSlug = Str::slug($request->title["en"], '-');
            if ($newSlug !== $data->slug && WhyChooseUs::where('slug', $newSlug)->where('id', '!=', $data->id)->exists()) {
                $newSlug .= '-' . Str::random(5);
            }

            // Update fields
            $data->title        = $request->title;
            $data->description  = $request->description;
            $data->status       = $request->status;
            $data->slug         = $newSlug;

            // Handle the image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($data->image) {
                    Helper::fileDelete($data->image);
                }

                // Upload the new image
                $imagePath = Helper::fileUpload($request->file('image'), 'WhyChooseUs', time() . '_' . $request->file('image')->getClientOriginalName());
                $data->image = $imagePath;
            }

            $data->save();

            return redirect()->route('why-choose-us.index')->with('t-success', 'Record updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('why-choose-us.index')->with('t-error', 'Something went wrong. Please try again.');
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
            $data = WhyChooseUs::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Why Choose Us deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Why Choose Us.',
            ]);
        }
    }
}
