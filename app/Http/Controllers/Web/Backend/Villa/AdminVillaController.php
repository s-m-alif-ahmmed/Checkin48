<?php

namespace App\Http\Controllers\Web\Backend\Villa;

use App\Helpers\Helper;
use App\Models\Villa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AdminVillaController extends Controller
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
            $data = Villa::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('villa_owner', function ($data) {
                    $villa_owner = $data->user->email;
                    return $villa_owner;
                })
                ->addColumn('image', function ($data) {
                    $img = '<img style="height: 75px" src="' . asset($data->villa_images->first()->image ?? '/frontend/assets/images/blog-1.png') . '" alt="' . $data->title . '"/>';
                    return $img;
                })
                ->addColumn('name', function ($data) {
                    $name = $data->title;
                    return $name;
                })
                ->addColumn('signature', function ($data) {
                    $signature = $data->signature
                        ? '<img width="150" height="100" src="data:image/png;base64,' . $data->signature . '" alt="Signature"/>'
                        : ''; // If no signature, return an empty string
                    return $signature;
                })
                ->addColumn('full_address', function ($data) {
                    $location = $data->full_address;
                    return $location;
                })
                ->addColumn('date', function ($data) {
                    $date = '<div class="villa-listing-details">Posting date: ' . $data->created_at->format('M d, Y') . '</div>';
                    return $date;
                })

                ->addColumn('status', function ($data) {
                    $statusOptions = [
                        'active' => 'Active',
                        'pending' => 'Pending',
                        'inactive' => 'Inactive',
                    ];

                    $status = '<select class="form-select status-dropdown"
                                       data-id="' . $data->id . '"
                                       onchange="showStatusChangeAlert(' . $data->id . ', this.value)"
                                       style="margin-left: 40px; width: 150px;">';

                    foreach ($statusOptions as $key => $value) {
                        $selected = $data->status == $key ? 'selected' : '';
                        $status .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }

                    $status .= '</select>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('villas.detail', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="View">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['villa_owner','image','name','signature','price','full_address','date','status','action'])
                ->make();
        }
        return view('backend.layouts.villa-list.index');
    }

    public function show($id)
    {
        $data = Villa::find($id);
        if (!$data) {
            return redirect()->route('villas.index')->with('t-error', 'Villa Not Found!');
        }

        return view('backend.layouts.villa-list.detail', compact('data'));
    }

    public function changeStatus(Request $request, $id)
    {
        $status = $request->input('status');

        // Validate the status
        if (!in_array($status, ['active', 'pending', 'inactive'])) {
            return response()->json(['success' => false, 'message' => 'Invalid status']);
        }

        // Update the status in the database
        $villa = Villa::find($id);
        if ($villa) {
            $villa->status = $status;
            $villa->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Record not found']);
    }

       /**
     * Remove the specified city content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = Villa::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Villa deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Villa.',
            ]);
        }
    }



}
