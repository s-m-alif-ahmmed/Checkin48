<?php

namespace App\Http\Controllers\Web\Backend\ExpertTeamMember;

use App\Helpers\Helper;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ExpertTeamMember;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ExpertTeamController extends Controller
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
            $data = ExpertTeamMember::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    if ($data->image) {
                        $url = asset($data->image);
                    } else {
                        $url = $defaultImage;
                    }
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })

                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('designation', function ($data) {
                    return $data->designation;
                })
                ->addColumn('skype', function ($data) {
                    return $data->skype;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('linkedin', function ($data) {
                    return $data->linkedin;
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
                                <a href="' . route('expert-team.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['image', 'name', 'designation', 'skype', 'email', 'linkedin', 'status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.expert-team.index');
    }

    //create
    public function create(): View
    {
        return view('backend.layouts.expert-team.create');
    }


    //store
    public function store(Request $request)
    {
        try {
            // Define the validation rules
            $validator = Validator::make($request->all(), [
                'name'          => 'nullable|array',
                'name.en'          => 'nullable|required_with:name.ar|string',
                'name.ar'          => 'nullable|required_with:name.en|string',

                'designation'   => 'nullable|array',
                'designation.en'   => 'nullable|required_with:designation.ar|string',
                'designation.ar'   => 'nullable|required_with:designation.en|string',

                'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status'        => 'nullable|in:active,inactive',
                'skype'         => 'nullable|string|max:255',
                'email'         => 'nullable|email|unique:expert_team_members,email',
                'linkedin'      => 'nullable|url|max:255',
            ]);

            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->only(['name', 'designation', 'status', 'skype', 'email', 'linkedin']);

            if ($request->hasFile('image')) {
                $imagePath = Helper::fileUpload($request->file('image'), 'ExpertTeam', time() . '_' . $request->file('image')->getClientOriginalName());
                if ($imagePath !== null) {
                    $data['image'] = $imagePath;
                } else {
                    throw new \Exception('Image upload failed.');
                }
            } else {
                throw new \Exception('Image is required.');
            }

            ExpertTeamMember::create($data);

            return redirect()->route('expert-team.index')->with('t-success', 'Team member added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['t-error' => $e->getMessage()])->withInput();
        }
    }

    //edit
    public function edit(int $id): View
    {
        $data = ExpertTeamMember::find($id);
        return view('backend.layouts.expert-team.edit', compact('data'));
    }


    //update
    public function update(Request $request, int $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'          => 'nullable|array',
                'name.en'          => 'nullable|required_with:name.ar|string',
                'name.ar'          => 'nullable|required_with:name.en|string',

                'designation'   => 'nullable|array',
                'designation.en'   => 'nullable|required_with:designation.ar|string',
                'designation.ar'   => 'nullable|required_with:designation.en|string',
                
                'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status'        => 'nullable|in:active,inactive',
                'skype'         => 'nullable|string|max:255',
                'email'         => [
                    'nullable',
                    'email',
                    Rule::unique('expert_team_members', 'email')->ignore($id),
                ],
                'linkedin'      => 'nullable|url|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                 = ExpertTeamMember::findOrFail($id);
            $data->name           = $request->name;
            $data->designation    = $request->designation;
            $data->skype          = $request->skype;
            $data->email          = $request->email;
            $data->linkedin       = $request->linkedin;
            $data->status         = $request->status;

            // Handle the image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($data->image) {
                    Helper::fileDelete($data->image);
                }

                // Upload the new image
                $data->image = Helper::fileUpload($request->file('image'), 'ExpertTeam', time() . '_' . $request->file('image')->getClientOriginalName());
            }

            $data->update();

            return redirect()->route('expert-team.index')->with('t-success', 'Team member updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['t-error' => $e->getMessage()])->withInput();
        }
    }
    //status change
    public function status(int $id): JsonResponse {
        $data = ExpertTeamMember::findOrFail($id);
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



    //destroy
    public function destroy(int $id): JsonResponse {
        try {
            $data = ExpertTeamMember::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Expert Team Member deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Expert Team Member.',
            ]);
        }
    }

}
