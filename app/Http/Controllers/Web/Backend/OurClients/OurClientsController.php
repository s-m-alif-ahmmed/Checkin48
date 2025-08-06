<?php

namespace App\Http\Controllers\Web\Backend\OurClients;

use App\Helpers\Helper;
use App\Models\OurClient;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class OurClientsController extends Controller
{
   /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse {
        if ($request->ajax()) {
            $data = OurClient::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('logo', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    if ($data->logo) {
                        $url = asset($data->logo);
                    } else {
                        $url = $defaultImage;
                    }
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
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
                                <a href="' . route('our-clients.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['logo', 'status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.our-client.index');
    }


    public function create(): View {
        return view('backend.layouts.our-client.create');
    }

    /**
     * Store a newly created dynamic page content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'status'    => 'required|in:active,inactive',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $validatedData = $validated->validated();

        if ($request->hasFile('logo')) {
            $logoPath = Helper::fileUpload($request->file('logo'), 'Clients', time() . '_' . $request->file('logo')->getClientOriginalName());
            if ($logoPath !== null) {
                $validatedData['logo'] = $logoPath;
            }
        }

        OurClient::create($validatedData);

        return redirect()->route('our-clients.index')->with('success', 'Client added successfully!');
    }

    /**
     * Show the form for editing the specified dynamic page content.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View {
        $data = OurClient::find($id);
        return view('backend.layouts.our-client.edit', compact('data'));
    }

    /**
     * Update the specified dynamic page content in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'logo'      => 'nullable|image|mimes:jpg,jpeg,png,gif',
                'status'    => 'required|in:active,inactive',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data          = OurClient::findOrFail($id);
            $data->status  = $request->status;

            // Handle the logo upload
            if ($request->hasFile('logo')) {
                // Delete the old logo if it exists
                if ($data->logo) {
                    Helper::fileDelete($data->logo);
                }

                // Upload the new logo
                $data->logo = Helper::fileUpload($request->file('logo'), 'Clients', time() . '_' . $request->file('logo')->getClientOriginalName());
            }

            $data->update();

            return redirect()->route('our-clients.index')->with('success', 'Client updated successfully!');

        } catch (\Exception $e) {
            return redirect()->route('our-clients.index')->with('error', 'Client failed to update');
        }
    }

    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = OurClient::findOrFail($id);
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
            $data = OurClient::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Our Client deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Our Client.',
            ]);
        }
    }


}
