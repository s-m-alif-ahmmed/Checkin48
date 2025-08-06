<?php

namespace App\Http\Controllers\Web\Backend\Villa;

use App\Helpers\Helper;
use App\Models\Amenity;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AmenityController extends Controller
{
    /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = Amenity::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name = $data->name;
                    return $name;
                })
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image ?? 'frontend/no-image.jpg' );
                    return '<img src="' . $imageUrl . '" alt="' . $data->name . '" style="width: 50px; height: 50px; object-fit: cover;">';
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
                                <a href="' . route('amenities.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['name', 'image', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.amenity.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|array',
            'name.en'      => 'required|required_with:name.ar|max:255',
            'name.ar'      => 'required|required_with:name.en|max:255',

            'status'    => 'required|in:active,inactive',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        try {
            $amenity = Amenity::create($validatedData);

            if ($request->hasFile('image')) {
                $logoPath = Helper::fileUpload($request->file('image'), 'Amenity', time() . '_' . $request->file('image')->getClientOriginalName());
                if ($logoPath !== null) {
                    $amenity->image = $logoPath;
                    $amenity->save();
                }
            }

            return redirect()->route('amenities.index')->with('t-success', 'Amenity created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Amenity create failed!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Amenity::find($id);
        return view('backend.layouts.amenity.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse {
        $validatedData = $request->validate([
            'name'      => 'nullable|array',
            'name.en'      => 'nullable|required_with:name.ar|max:255',
            'name.ar'      => 'nullable|required_with:name.en|max:255',

            'status'    => 'nullable|in:active,inactive',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        try {
            $amenity            = Amenity::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($amenity->image) {
                    Helper::fileDelete($amenity->image);
                }

                $logoPath = Helper::fileUpload($request->file('image'), 'Amenity', time() . '_' . $request->file('image')->getClientOriginalName());
                if ($logoPath !== null) {
                    $amenity->image = $logoPath;
                }
            }

            $amenity->name      = $validatedData['name'];
            $amenity->status    = $validatedData['status'];
            $amenity->update();

            return redirect()->route('amenities.index')->with('t-success', 'Amenity updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Amenity update failed!');
        }
    }

    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = Amenity::findOrFail($id);
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
     * Remove the specified dynamic page content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = Amenity::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Amenity deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Faq.',
            ]);
        }
    }
}
