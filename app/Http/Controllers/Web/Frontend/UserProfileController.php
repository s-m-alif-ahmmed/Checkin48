<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username'      => 'required|max:100|min:2',
            'name'          => 'required|max:100|min:2',
            'email'         => 'required|email',
            'number'        => 'nullable|numeric',
            'website'       => 'nullable|url',
            'about'         => 'nullable',
            'country_id'    => 'nullable',
            'city_id'       => 'nullable',
            'state_id'      => 'nullable',
            'zip_code'      => 'nullable|numeric',
            'map_location'  => 'nullable',
            'address'       => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Fetch user by ID
            $user = User::findOrFail($id);

            // Update fields
            $user->username     = $request->username;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->number       = $request->number;
            $user->website      = $request->website;
            $user->about        = $request->about;
            $user->country_id   = $request->country_id;
            $user->city_id      = $request->city_id;
            $user->state_id     = $request->state_id;
            $user->zip_code     = $request->zip_code;
            $user->map_location = $request->map_location;
            $user->address      = $request->address;
            $user->save();

            return redirect()->back()->with('t-success', __('Profile updated successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', __('Something went wrong') . $e->getMessage());
        }
    }


    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdatePassword(Request $request)
    {
        // Validation rules for password change
        $validator = Validator::make($request->all(), [
            'old_password' => 'required', // Ensure the old password is entered
            'password'     => 'required|confirmed|min:8', // New password must be confirmed and at least 8 characters
        ]);

        if ($validator->fails()) {
            // If validation fails, return back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Get the current logged-in user
            $user = Auth::user();

            // Check if the entered old password matches the stored password
            if (Hash::check($request->old_password, $user->password)) {
                // Update the password with the new one (hashed)
                $user->password = Hash::make($request->password);
                $user->save();

                // Return success message
                return redirect()->back()->with('t-success', __('Password updated successfully'));
            } else {
                // If old password is incorrect, show an error message
                return redirect()->back()->with('t-error', __('Current password is incorrect'));
            }
        } catch (\Exception $e) {
            // If an error occurs, show a generic error message
            return redirect()->back()->with('t-error', __('Something went wrong') . $e->getMessage());
        }
    }


    /**
     * Update the user's profile picture.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfilePhoto(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $user = Auth::user();
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Delete the old avatar if it exists
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }

            // Upload the new avatar
            $imagePath = $image->move(public_path('uploads/profile'), $imageName);

            // Update user record
            $user->avatar = 'uploads/profile/' . $imageName;
            $user->save();

            return response()->json([
                'success' => true,
                'image_url' => asset('uploads/profile/' . $imageName),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function DeleteProfilePhoto()
    {
        try {
            $user = Auth::user();

            // Check if the user has a profile photo
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                // Delete the file
                unlink(public_path($user->avatar));
            }

            // Reset the avatar field in the database
            $user->avatar = null;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => __('Profile picture removed successfully.'),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


//    Villa Owner profile

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function ownerUpdateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:100|min:2',
            'name' => 'required|max:100|min:2',
            'email' => 'required|email',
            'number' => 'nullable|numeric',
            'website' => 'nullable|url',
            'about' => 'nullable',
            'country_id' => 'nullable',
            'city_id' => 'nullable',
            'zip_code' => 'nullable|numeric',
            'map_location' => 'nullable',
            'address' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Fetch user by ID
            $user = User::findOrFail($id);

            // Update fields
            $user->username     = $request->username;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->number       = $request->number;
            $user->website      = $request->website;
            $user->about        = $request->about;
            $user->country_id   = $request->country_id;
            $user->city_id      = $request->city_id;
            $user->zip_code     = $request->zip_code;
            $user->map_location = $request->map_location;
            $user->address      = $request->address;
            $user->save();

            return redirect()->back()->with('t-success', __('Profile updated successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', __('Something went wrong') . $e->getMessage());
        }
    }


    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function ownerUpdatePassword(Request $request)
    {
        // Validation rules for password change
        $validator = Validator::make($request->all(), [
            'old_password' => 'required', // Ensure the old password is entered
            'password'     => 'required|confirmed|min:8', // New password must be confirmed and at least 8 characters
        ]);

        if ($validator->fails()) {
            // If validation fails, return back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Get the current logged-in user
            $user = Auth::user();

            // Check if the entered old password matches the stored password
            if (Hash::check($request->old_password, $user->password)) {
                // Update the password with the new one (hashed)
                $user->password = Hash::make($request->password);
                $user->save();

                // Return success message
                return redirect()->back()->with('t-success', __('Password updated successfully'));
            } else {
                // If old password is incorrect, show an error message
                return redirect()->back()->with('t-error', __('Current password is incorrect'));
            }
        } catch (\Exception $e) {
            // If an error occurs, show a generic error message
            return redirect()->back()->with('t-error', __('Something went wrong') . $e->getMessage());
        }
    }

    /**
     * Update the user's profile picture.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function ownerUpdateProfilePhoto(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $user = Auth::user();
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Delete the old avatar if it exists
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }

            // Upload the new avatar
            $imagePath = $image->move(public_path('uploads/profile'), $imageName);

            // Update user record
            $user->avatar = 'uploads/profile/' . $imageName;
            $user->save();

            return response()->json([
                'success' => true,
                'image_url' => asset('uploads/profile/' . $imageName),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function ownerDeleteProfilePhoto()
    {
        try {
            $user = Auth::user();

            // Check if the user has a profile photo
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                // Delete the file
                unlink(public_path($user->avatar));
            }

            // Reset the avatar field in the database
            $user->avatar = null;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => __('Profile picture removed successfully.'),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
