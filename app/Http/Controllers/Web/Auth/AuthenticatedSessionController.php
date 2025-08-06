<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): RedirectResponse
    {
        return redirect()->back();
    }

    /**
     * Handle an incoming authentication request.
     */
//    public function store(LoginRequest $request): RedirectResponse
//    {
//        try {
//            $request->authenticate();
//
//            $request->session()->regenerate();
//
//            //Send mail to admin
//            $messageContent = $request->user()->name . ' (' . $request->user()->email . ')'.'Login successfully.';
//            $admins = User::where('role', 'admin')->get();
//            foreach ($admins as $admin) {
//                $admin->notify(new OwnerVillaNotification($messageContent));
//            }
//
//            return redirect()->intended(url()->previous() ?: back())
//                ->with('t-success', __('Login successfully.'));
//
//        } catch (\Illuminate\Validation\ValidationException $e) {
//            // Pass the error message to the session for display
//            return redirect()->back()
//            ->withErrors($e->errors())
//            ->with('t-error', $e->errors()['email'][0]); // Get the first error message for the 'email' key
//        }
//    }

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return redirect()->back()
                    ->withErrors(['email' => __('The email address is not registered.')])
                    ->with('t-error', __('The email address is not registered.'));
            }

            if (!Auth::attempt($credentials)) {
                return redirect()->back()
                    ->withErrors(['password' => __('The password is incorrect.')])
                    ->with('t-error', __('The password is incorrect.'));
            }

            $request->session()->regenerate();

            // Send mail to admin
//            $messageContent = $user->name . ' (' . $user->email . ')' . ' logged in successfully.';
//            $admins = User::where('role', 'admin')->get();
//            foreach ($admins as $admin) {
//                $admin->notify(new OwnerVillaNotification($messageContent));
//            }

            return redirect()->intended(url()->previous() ?: route('dashboard'))
                ->with('t-success', __('Login successfully.'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => __('Something went wrong. Please try again.')])
                ->with('t-error', __('Something went wrong. Please try again.'));
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
