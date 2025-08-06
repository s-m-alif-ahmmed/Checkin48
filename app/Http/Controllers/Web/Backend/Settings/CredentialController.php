<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CredentialController extends Controller
{
    /**
     * Display stripe settings page.
     *
     * @return View
     */
    public function facebook(): View {
        return view('backend.layouts.settings.facebook_settings');
    }
    /**
     * Display stripe settings page.
     *
     * @return View
     */
    public function google(): View {
        return view('backend.layouts.settings.google_settings');
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'facebook_client_id' => 'nullable|string',
            'facebook_client_secret_id' => 'nullable|string',
            'google_client_id' => 'nullable|string',
            'google_client_secret_id' => 'nullable|string',
        ]);

        // Retrieve or create the policy record
        $credential = Credential::first() ?? new Credential();

        // Update policy content
        $credential->facebook_client_id = $request->facebook_client_id;
        $credential->facebook_client_secret_id = $request->facebook_client_secret_id;
        $credential->google_client_id = $request->google_client_id;
        $credential->google_client_secret_id = $request->google_client_secret_id;
        $credential->save();

        // Update .env file
        $this->updateEnv([
            'FACEBOOK_CLIENT_ID' => $request->facebook_client_id,
            'FACEBOOK_CLIENT_SECRET' => $request->facebook_client_secret_id,
            'GOOGLE_CLIENT_ID' => $request->google_client_id,
            'GOOGLE_CLIENT_SECRET' => $request->google_client_secret_id,
        ]);

        // Redirect back with success message
        return back()->with('t-success', 'Credentials successfully updated');
    }

    // Private function to update .env datas
    private function updateEnv($data)
    {
        $envPath = base_path('.env');

        if (File::exists($envPath)) {
            $envContent = File::get($envPath);

            foreach ($data as $key => $value) {
                $pattern = "/^{$key}=.*/m";
                $replacement = "{$key}={$value}";

                if (preg_match($pattern, $envContent)) {
                    $envContent = preg_replace($pattern, $replacement, $envContent);
                } else {
                    $envContent .= "\n{$key}={$value}";
                }
            }

            File::put($envPath, $envContent);
        }
    }
}
