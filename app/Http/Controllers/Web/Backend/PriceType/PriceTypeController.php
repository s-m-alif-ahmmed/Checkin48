<?php

namespace App\Http\Controllers\Web\Backend\PriceType;

use App\Helpers\Helper;
use App\Models\Villa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\PriceType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PriceTypeController extends Controller
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
            $data = PriceType::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('name', function ($data) {
                    return $data->name ?? '';
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
                                <a href="' . route('price.types.edit', $data->id) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>                               
                            </div>';
                })

                ->rawColumns(['name', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.price-type.index');
    }


    /**
     * Show the form for creating a new price type content.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.layouts.price-type.create');
    }

    /**
     * Store a newly created price type content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|array',
                'name.en' => 'nullable|required_with:name.ar|string|max:255',
                'name.ar' => 'nullable|required_with:name.en|string|max:255',
            ]);

            // Store the name in JSON format
            $priceType = new PriceType();
            $priceType->name = $request->name;
            $priceType->save();

            return redirect()->route('price.types.index')->with('t-success', 'Created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Failed to create. Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing a new price type content.
     *
     * @return View
     */

     public function edit($id): View
     {
         $priceType = PriceType::findOrFail($id);
         return view('backend.layouts.price-type.edit', compact('priceType'));
     }
     


    /**
     * Show the form for updateing a new price type content.
     *
     * @return View
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|array',
                'name.en' => 'nullable|required_with:name.ar|string|max:255',
                'name.ar' => 'nullable|required_with:name.en|string|max:255',
            ]);
    
            $priceType = PriceType::findOrFail($id);
            $priceType->name = $request->name;
            $priceType->save();
    
            return redirect()->route('price.types.index')->with('t-success', 'Updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Failed to update. Error: ' . $e->getMessage());
        }
    }
    



    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = PriceType::findOrFail($id);
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
            $data = PriceType::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Price Type deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Price Type.',
            ]);
        }
    }
}
