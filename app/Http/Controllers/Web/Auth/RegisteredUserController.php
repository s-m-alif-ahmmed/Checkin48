<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): RedirectResponse
    {
        return redirect()->route('home');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {

        try {
        // Use merge() to lowercase the email
        $request->merge([
            'email' => strtolower($request->email),
        ]);
        $request->validate([
            'name'                  => ['required', 'string', 'max:100'],
            'role'                  => ['nullable', 'in:admin,user,owner',],
            'terms_and_policy'      => ['nullable', 'numeric'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'role'                  => $request->role,
            'terms_and_policy'      => $request->terms_and_policy === null ? 0 : (int) $request->terms_and_policy,
            'password'              => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

//        // Send mail to admin
//        $messageContent = $request->user()->name . ' (' . $request->user()->email . ')'. 'Registration successfully done!';
//        $admins = User::where('role', 'admin')->get();
//        foreach ($admins as $admin) {
//            $admin->notify(new OwnerVillaNotification($messageContent));
//        }

        event(new Registered($user));

        Auth::login($user);

        // Role-based redirection map
        $roleRedirectMap = [
            'admin' => 'dashboard',
            'owner' => 'owner.dashboard',
            'user'  => 'user.dashboard',
        ];

        // Redirect based on the user's role or default to the home route
        return isset($roleRedirectMap[$user->role])
            ? redirect()->route($roleRedirectMap[$user->role])->with('t-success', 'Registration and Login successfully done!')
            : redirect()->route('home')->with('t-success', 'Registration successfully done!');
        } catch (Exception $e) {
            // If any exception occurs, redirect with error message
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
