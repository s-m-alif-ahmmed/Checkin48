<?php

namespace App\Http\Controllers\Web\Backend\BenefitOfJoining;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\BenefitsOfJoining;
use App\Http\Controllers\Controller;

class BenefitsofJoiningController extends Controller
{
    public function index()
    {
        $item = BenefitsOfJoining::first();
        return view('backend.layouts.benefits.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|array',
            'title.en' => 'required_with:title.ar|string|max:255',
            'title.ar' => 'required_with:title.en|string|max:255',

            'sub_title' => 'nullable|array',
            'sub_title.en' => 'nullable|required_with:sub_title.ar|string|max:255',
            'sub_title.ar' => 'nullable|required_with:sub_title.en|string|max:255',

            'title_two' => 'nullable|array',
            'title_two.en' => 'nullable|required_with:title_two.ar|string|max:255',
            'title_two.ar' => 'nullable|required_with:title_two.en|string|max:255',

            'title_three' => 'nullable|array',
            'title_three.en' => 'nullable|required_with:title_three.ar|string|max:255',
            'title_three.ar' => 'nullable|required_with:title_three.en|string|max:255',

            'title_four' => 'nullable|array',
            'title_four.en' => 'nullable|required_with:title_four.ar|string|max:255',
            'title_four.ar' => 'nullable|required_with:title_four.en|string|max:255',
            
            'image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            // Find the BenefitsOfJoining record by ID
            $benefit = BenefitsOfJoining::findOrFail($id);

            // Update the record
            $benefit->title = $request->title;
            $benefit->sub_title = $request->sub_title;
            $benefit->title_two = $request->title_two;
            $benefit->title_three = $request->title_three;
            $benefit->title_four = $request->title_four;
            $benefit->status = $request->status;

            if ($request->hasFile('image')) {
                $imagePath = Helper::fileUpload($request->file('image'), 'BenefitsOfJoining', time() . '_' . $request->file('image')->getClientOriginalName());
                if ($imagePath !== null) {
                    $benefit->image = $imagePath;
                }
            }

            $benefit->save();

            // Redirect with a success message
            return redirect()->route('benefits-of-joining.index')->with('t-success', 'Benefit updated successfully');
        } catch (\Exception $e) {
            // Redirect with an error message
            return redirect()->route('benefits-of-joining.index')->with('t-error', 'Error occurred while updating Benefit. Please try again.');
        }
    }
}
