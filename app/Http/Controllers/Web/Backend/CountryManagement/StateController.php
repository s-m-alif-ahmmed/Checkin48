<?php

namespace App\Http\Controllers\Web\Backend\CountryManagement;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class StateController extends Controller
{
    /**
     * Display a listing of city content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse {
        if ($request->ajax()) {
            $data = State::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('country_name', function ($data) {
                    $country_name = $data->country->name;
                    return $country_name;
                })
                ->addColumn('city_name', function ($data) {
                    $city_name = $data->city->name;
                    return $city_name;
                })
                ->addColumn('name', function ($data) {
                    $name = $data->name;
                    return $name;
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
                                <a href="' . route('state.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['country_name', 'city_name', 'name', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.country-management.state.index');
    }

    /**
     * Show the form for creating a new state content.
     *
     * @return View
     */
    public function create(): View {
        $countries = Country::all();
        $cities = City::all();
        return view('backend.layouts.country-management.state.create',[
            'countries' => $countries,
            'cities' => $cities,
        ]);
    }

    /**
     * Store a newly created state content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'country_id'    => 'required',
                'city_id'       => 'required',
                'name'          => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = new State();
            $data->country_id       = $request->country_id;
            $data->city_id          = $request->city_id;
            $data->name             = $request->name;
            $data->save();

            return redirect()->route('state.index')->with('t-success', 'Updated successfully');
        } catch (\Exception) {
            return redirect()->route('state.index')->with('t-success', 'State failed created.');
        }
    }

    /**
     * Show the form for editing the specified state content.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View {
        $countries = Country::all();
        $cities = City::all();
        $data = State::find($id);
        return view('backend.layouts.country-management.state.edit', compact('data', 'countries', 'cities'));
    }

    /**
     * Update the specified dynamic state in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'country_id'    => 'required',
                'city_id'       => 'required',
                'name'          => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = State::findOrFail($id);
            $data->country_id       = $request->country_id;
            $data->city_id          = $request->city_id;
            $data->name             = $request->name;
            $data->update();

            return redirect()->route('state.index')->with('t-success', 'State Updated Successfully.');

        } catch (\Exception) {
            return redirect()->route('state.index')->with('t-success', 'State failed to update');
        }
    }

    /**
     * Change the status of the specified state content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = State::findOrFail($id);
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
     * Remove the specified state content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = State::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'State deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the State.',
            ]);
        }
    }



}
