<?php

namespace App\Http\Controllers\Web\Backend\OurMission;

use App\Helpers\Helper;
use App\Models\OurMission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurMissionController extends Controller
{
    public function index()
    {
        $item = OurMission::first();
        return view('backend.layouts.our-mission.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'nullable|array',
            'title.en' => 'nullable|required_with:title.ar|string|max:255',
            'title.ar' => 'nullable|required_with:title.en|string|max:255',

            'sub_title' => 'nullable|array',
            'sub_title.en' => 'nullable|required_with:sub_title.ar|string|max:255',
            'sub_title.ar' => 'nullable|required_with:sub_title.en|string|max:255',

            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480', // 20MB max size

            'heading_one_title' => 'nullable|array',
            'heading_one_title.en' => 'nullable|required_with:heading_one_title.ar|string|max:255',
            'heading_one_title.ar' => 'nullable|required_with:heading_one_title.en|string|max:255',

            'heading_one_description' => 'nullable|array',
            'heading_one_description.en' => 'nullable|required_with:heading_one_description.ar|string',
            'heading_one_description.ar' => 'nullable|required_with:heading_one_description.en|string',

            'heading_two_title' => 'nullable|array',
            'heading_two_title.en' => 'nullable|required_with:heading_two_title.ar|string|max:255',
            'heading_two_title.ar' => 'nullable|required_with:heading_two_title.en|string|max:255',

            'heading_two_description' => 'nullable|array',
            'heading_two_description.en' => 'nullable|required_with:heading_two_description.ar|string',
            'heading_two_description.ar' => 'nullable|required_with:heading_two_description.en|string',

            'heading_three_title' => 'nullable|array',
            'heading_three_title.en' => 'nullable|required_with:heading_three_title.ar|string|max:255',
            'heading_three_title.ar' => 'nullable|required_with:heading_three_title.en|string|max:255',

            'heading_three_description' => 'nullable|array',
            'heading_three_description.en' => 'nullable|required_with:heading_three_description.ar|string',
            'heading_three_description.ar' => 'nullable|required_with:heading_three_description.en|string',

            'status' => 'nullable|in:active,inactive',
        ]);

        try {
            // Find the item by ID or throw a 404 exception
            $item = OurMission::findOrFail($id);

            // Update the item with the validated data
            $item->update([
                'title' => $request->input('title'),
                'sub_title' => $request->input('sub_title'),
                'heading_one_title' => $request->input('heading_one_title'),
                'heading_one_description' => $request->input('heading_one_description'),
                'heading_two_title' => $request->input('heading_two_title'),
                'heading_two_description' => $request->input('heading_two_description'),
                'heading_three_title' => $request->input('heading_three_title'),
                'heading_three_description' => $request->input('heading_three_description'),
                'status' => $request->input('status'),
            ]);

            // Check if the user has uploaded a new media
            if ($request->hasFile('media')) {
                // Delete the old media if it exists
                if ($item->media !== null) {
                    Helper::fileDelete($item->media);
                }
                // Upload the new media
                $imagePath = Helper::fileUpload($request->file('media'), 'Media/OurMission', time() . '_' . $request->file('media')->getClientOriginalName());

                // Update the media attribute
                $item->media = $imagePath;

                // Save the updated item
                $item->save();
            }

            // Redirect back with a success message
            return redirect()->route('our-mission.index')
                ->with('t-success', 'Our Mission updated successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route('our-mission.index')
                ->with('t-error', 'Something went wrong. Please try again later.');
        }
    }
}
