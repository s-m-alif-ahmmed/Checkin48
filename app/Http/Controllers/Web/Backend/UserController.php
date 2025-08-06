<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @param Request $request
     * @return JsonResponse|View
     */
    public function index(Request $request): JsonResponse | View {
        if ($request->ajax()) {
            $query = User::query();

            if ($request->role) {
                $query->where('role', $request->role);
            }

            $data = $query->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', fn($data) => $data->name)
                ->addColumn('email', fn($data) => $data->email)
                ->addColumn('role', fn($data) => ucfirst($data->role)) // New Role Column
                ->addColumn('avatar', function ($data) {
                    $defaultImage = asset('frontend/profile-avatar.png');
                    $url = $data->avatar ? asset($data->avatar) : $defaultImage;
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    return '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">
                            <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">
                            <span style="' . $sliderStyles . '"></span>
                            <label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>
                        </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="' . route('admin.login-as-user', $data->id) . '" class="btn btn-primary text-white" title="Login as User">
                                <i class="fe fe-log-in"></i>
                            </a>
                            <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                <i class="fe fe-trash"></i>
                            </a>
                        </div>';
                })
                ->rawColumns(['avatar', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.user.index');
    }

    public function loginAsUser($id)
    {
        $admin = Auth::user();

        // Ensure only admins can log in as another user
        if (!$admin || $admin->role !== 'admin') {
            return redirect()->route('dashboard')->with('t-error', __('Unauthorized access.'));
        }

        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('t-error', __('User not found.'));
        }

        // Log in as the selected user
        Auth::login($user);

        return redirect()->route('dashboard')->with('t-success', __('You are now logged in as ') . $user->name);
    }

    /**
     * Change the status of the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = User::findOrFail($id);
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
