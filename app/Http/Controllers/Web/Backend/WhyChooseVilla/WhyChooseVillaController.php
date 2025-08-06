<?php

namespace App\Http\Controllers\Web\Backend\WhyChooseVilla;

use App\Helpers\Helper;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\WhyBookVilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class WhyChooseVillaController extends Controller
{
    /**
     * Display a listing of CMS content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = WhyBookVilla::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('icon', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    if ($data->icon) {
                        $url = asset($data->icon);
                    } else {
                        $url = $defaultImage;
                    }
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('title', function ($data) {
                    $title = $data->title;
                    return $title;
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
                                <a href="' . route('why-choose-villa.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['icon', 'title', 'description', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.why-choose-villa.index');
    }

    //create
    public function create()
    {
        return view('backend.layouts.why-choose-villa.create');
    }

    //store
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'icon'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'              => 'required|array',
            'title.en'           => 'required|required_with:title.ar|string|max:255',
            'title.ar'           => 'required|required_with:title.en|string|max:255',
            'description'        => 'required|array',
            'description.en'     => 'required|required_with:description.ar|string|max:255',
            'description.ar'     => 'required|required_with:description.en|string|max:255',
            'status'             => 'required|in:active,inactive',
        ]);

        try {
            // Store the image using the FileUpload helper
            $icon = Helper::fileUpload($request->icon, 'why_book_villas', time() . '_' . $request->file('icon')->getClientOriginalName());

            // Generate a slug from the title
            $slug = Str::slug($request->title["en"], '-');

            // Check if the slug already exists (optional for uniqueness)
            $existingSlug = WhyBookVilla::where('slug', $slug)->exists();

            if ($existingSlug) {
                $slug .= '-' . Str::random(5); // Append random characters to ensure uniqueness
            }

            $data                   = new WhyBookVilla();
            $data->icon             = $icon;
            $data->title            = $request->title;
            $data->description      = $request->description;
            $data->status           = $request->status;
            $data->slug             = $slug;
            $data->save();

            // Redirect or return a response
            return redirect()->route('why-choose-villa.index')->with('t-success', 'Data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified CMS content.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $data = WhyBookVilla::find($id);
        return view('backend.layouts.why-choose-villa.edit', compact('data'));
    }

    /**
     * Update the specified dynamic CMS in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'icon'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'title'              => 'nullable|array',
                'title.en'           => 'nullable|required_with:title.ar|string|max:255',
                'title.ar'           => 'nullable|required_with:title.en|string|max:255',
                'description'        => 'nullable|array',
                'description.en'     => 'nullable|required_with:description.ar|string|max:255',
                'description.ar'     => 'nullable|required_with:description.en|string|max:255',

                'status'             => 'required|in:active,inactive',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Fetch the existing data
            $data = WhyBookVilla::findOrFail($id);

            // Generate a unique slug
            $newSlug = Str::slug($request->title["en"], '-');
            if (WhyBookVilla::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                $newSlug .= '-' . Str::random(5);
            }

            // Update fields
            $data->title        = $request->title;
            $data->description  = $request->description;
            $data->status       = $request->status;
            $data->slug         = $newSlug;

            // Handle the icon upload
            if ($request->hasFile('icon')) {
                // Delete the old icon if it exists
                if ($data->icon) {
                    Helper::fileDelete($data->icon);
                }

                // Upload the new icon
                $data->icon = Helper::fileUpload($request->file('icon'), 'why_book_villas/', Str::random(10));
            }

            $data->update();

            return redirect()->route('why-choose-villa.index')->with('t-success', 'City Updated Successfully.');
        } catch (\Exception) {
            return redirect()->route('why-choose-villa.index')->with('t-success', 'City failed to update');
        }
    }

    /**
     * Change the status of the specified CMS content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = WhyBookVilla::findOrFail($id);
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
     * Remove the specified CMS content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = WhyBookVilla::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Data.',
            ]);
        }
    }
}
