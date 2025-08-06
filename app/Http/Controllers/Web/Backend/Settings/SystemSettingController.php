<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SystemSettingController extends Controller {
    /**
     * Display the system settings page.
     *
     * @return View
     */
    public function index(): View {
        $setting = SystemSetting::latest('id')->first();
        return view('backend.layouts.settings.system_settings', compact('setting'));
    }

    /**
     * Update the system settings.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        $validator = Validator::make($request->all(), [
            'title'          => 'nullable|array',
            'title.en'       => 'nullable|required_with:title.ar|string',
            'title.ar'       => 'nullable|required_with:title.en|string',

            'email'          => 'nullable',

            'system_name'    => 'nullable|array',
            'system_name.en' => 'nullable|required_with:system_name.ar|string',
            'system_name.ar' => 'nullable|required_with:system_name.en|string',

            'copyright_text'    => 'nullable|array',
            'copyright_text.en' => 'nullable|required_with:copyright_text.ar|string',
            'copyright_text.ar' => 'nullable|required_with:copyright_text.en|string',

            'logo'           => 'nullable',
            'favicon'        => 'nullable',

            'description'    => 'nullable|array',
            'description.en' => 'nullable|required_with:description.ar|string',
            'description.ar' => 'nullable|required_with:description.en|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $setting                 = SystemSetting::firstOrNew();
            $setting->title          = $request->title;
            $setting->email          = $request->email;
            $setting->system_name    = $request->system_name;
            $setting->copyright_text = $request->copyright_text;
            $setting->logo           = $request->logo;
            $setting->favicon        = $request->favicon;
            $setting->description    = $request->description;

            if ($request->hasFile('logo')) {
                if ($setting->logo && file_exists(public_path($setting->logo))) {
                    Helper::fileDelete(public_path($setting->logo));
                }
                $setting->logo = Helper::fileUpload($request->file('logo'), 'logo', $setting->logo);
            } else {
                // Retain the existing logo if no new file is uploaded
                $setting->logo = $setting->logo ?? $setting->getOriginal('logo');
            }

            if ($request->hasFile('favicon')) {
                if ($setting->favicon && file_exists(public_path($setting->favicon))) {
                    Helper::fileDelete(public_path($setting->favicon));
                }
                $setting->favicon = Helper::fileUpload($request->file('favicon'), 'favicon', $setting->favicon);
            } else {
                // Retain the existing favicon if no new file is uploaded
                $setting->favicon = $setting->favicon ?? $setting->getOriginal('favicon');
            }

            $setting->save();
            return back()->with('t-success', 'Updated successfully');
        } catch (Exception) {
            return back()->with('t-error', 'Failed to update');
        }
    }
}
