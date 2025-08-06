<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirect(Request $request)
    {
        $role = $request->query('role'); // Capture the role from the request
        if ($role && !in_array($role, ['user', 'owner'])) {
            return redirect()->back()->withErrors(['t-error' => __('Invalid role.')]);
        }

        // Include the role in the state parameter (if provided)
        $state = [
            'role' => $role,
            'redirect_url' => url()->previous() // Capture the current URL
        ];
        return Socialite::driver('google')
            ->with(['state' => base64_encode(json_encode($state))])
            ->redirect();
    }

    public function callback(Request $request )
    {
        try {
            // Retrieve user information from Google
            $socialUser = Socialite::driver('google')->stateless()->user();

            // Decode the role from the state parameter
            $state = $request->query('state');
            $decodedState = json_decode(base64_decode($state), true);
            $role = $decodedState['role'] ?? null;
            $redirectUrl = $decodedState['redirect_url'];

            // Validate role
            if (!in_array($role, ['user', 'owner'])) {
                $role = 'user'; // Default to 'user' if the role is invalid or missing
            }

            // Check if the user already exists (by provider ID or email)
            $user = User::where('google_id', $socialUser->getId())
                ->orWhere('email', $socialUser->getEmail())
                ->first();

            if ($user) {
                // Log in the user directly if they exist
                Auth::login($user);
            } else {
                // Register a new user with the appropriate role
                $user = User::create([
                    'name'              => $socialUser->getName(),
                    'email'             => $socialUser->getEmail(),
                    'avatar'            => $socialUser->getAvatar(),
                    'password'          => Hash::make('password'),
                    'role'              => $role,
                    'provider'          => 'google',
                    'google_id'         => $socialUser->getId(),
                    'provider_token'    => $socialUser->token,
                ]);

                // Log in the newly registered user
                Auth::login($user);
            }

//            //Send mail to admin
//            $messageContent = $request->user()->name . ' (' . $request->user()->email . ')'.'Registration successfully!';
//            $admins = User::where('role', 'admin')->get();
//            foreach ($admins as $admin) {
//                $admin->notify(new OwnerVillaNotification($messageContent));
//            }

            // Redirect to the home page or desired URL
            return redirect($redirectUrl)->with('t-success', __('Login successfully.'));

        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the process
            return redirect()->back()->withInput()->withErrors([
                't-error' => $e->getMessage(),
            ]);
        }
    }

    public function redirectFacebook(Request $request )
    {
        $role = $request->query('role'); // Capture the role from the request
        if ($role && !in_array($role, ['user', 'owner'])) {
            return redirect()->back()->withErrors(['message' => __('Invalid role.')]);
        }

        // Include the role in the state parameter (if provided)
        $state = [
            'role' => $role,
            'redirect_url' => url()->previous() // Capture the current URL
        ];
        return Socialite::driver('facebook')
            ->with(['state' => base64_encode(json_encode($state))])
            ->redirect();
    }

    public function callbackFacebook( Request $request )
    {
        try {
            // Retrieve user information from Google
            $socialUser = Socialite::driver('facebook')->stateless()->user();

            // Decode the role from the state parameter
            $state = $request->query('state');
            $decodedState = json_decode(base64_decode($state), true);
            $role = $decodedState['role'] ?? null;
            $redirectUrl = $decodedState['redirect_url'];

            // Validate role
            if (!in_array($role, ['user', 'owner'])) {
                $role = 'user'; // Default to 'user' if the role is invalid or missing
            }

            // Check if the user already exists (by provider ID or email)
            $user = User::where('facebook_id', $socialUser->getId())
                ->orWhere('email', $socialUser->getEmail())
                ->first();

            if ($user) {
                // Log in the user directly if they exist
                Auth::login($user);
            } else {
                // Register a new user with the appropriate role
                $user = User::create([
                    'name'              => $socialUser->getName(),
                    'email'             => $socialUser->getEmail(),
                    'avatar'            => $socialUser->getAvatar(),
                    'password'          => Hash::make('password'),
                    'role'              => $role,
                    'provider'          => 'facebook',
                    'facebook_id'       => $socialUser->getId(),
                    'provider_token'    => $socialUser->token,
                ]);

                // Log in the newly registered user
                Auth::login($user);
            }

//            //Send mail to admin
//            $messageContent = $request->user()->name . ' (' . $request->user()->email . ')'.'Registration successfully!';
//            $admins = User::where('role', 'admin')->get();
//            foreach ($admins as $admin) {
//                $admin->notify(new OwnerVillaNotification($messageContent));
//            }

            // Redirect to the home page or desired URL
            return redirect($redirectUrl)->with('t-success', __('Login successfully.'));

        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the process
            return redirect()->back()->withInput()->withErrors([
                't-error' => $e->getMessage(),
            ]);
        }
    }


    public function check_auth()
    {
        if(Auth::check()){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }


}
