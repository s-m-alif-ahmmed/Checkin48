<?php

namespace App\Http\Controllers\Web\Frontend\Owner;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\AdminVillaAdd;
use App\Mail\OwnerVillaAdd;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\OwnerStatement;
use App\Models\PriceType;
use App\Models\PropertyLabel;
use App\Models\Tax;
use App\Models\User;
use App\Models\Villa;
use App\Models\VillaImage;
use App\Models\VillaOffDate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VillaController extends Controller
{
    public function ownerAddVilla()
    {
        $user = Auth::user();
        $countries = Country::where('status', 'active')->orderBy('name', 'asc')->get();
        $property_labels = PropertyLabel::where('status', 'active')->latest()->get();
        $amenities = Amenity::where('status', 'active')->latest()->get();
        $tax = Tax::where('status', 'active')->first();
        $owner_statements = OwnerStatement::where('status', 'active')->get();
        $price_types = PriceType::where('status', 'active')->get();

        return view('frontend.layouts.owner-dashboard.layouts.add-villa', compact('user', 'countries', 'property_labels', 'amenities', 'tax', 'owner_statements', 'price_types'));
    }

    public function ownerVillaStore(Request $request): RedirectResponse
    {
        $request->validate([
            'villa_image.*'         => 'required|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'amenity_id.*'          => 'nullable|integer|exists:amenities,id',
            'country_id'            => 'required|integer|exists:countries,id',
            'city_id'               => 'nullable|integer|exists:cities,id',

            'title'                 => 'required|array',
            'title.en'              => 'required|required_with:title.ar|string|max:255',
            'title.ar'              => 'required|required_with:title.en|string|max:255',

            'price_type_id'         => 'required|array',
            'price_type_id.*'       => 'nullable|integer|exists:price_types,id',
            'price'                 => 'required|array',
            'price.*'               => 'nullable|numeric|min:0',

            'description'           => 'required|array',
            'description.en'        => 'required|required_with:description.ar|string',
            'description.ar'        => 'required|required_with:description.en|string',

            'full_address'          => 'required|array',
            'full_address.en'       => 'required|required_with:full_address.ar|string|max:255',
            'full_address.ar'       => 'required|required_with:full_address.en|string|max:255',
            'property_label_id'     => 'required|integer|exists:property_labels,id',
            'property_type'         => 'required|string|max:100',
            'room'                  => 'required|integer|min:1',
            'bathroom'              => 'required|integer|min:1',
            'balcony'               => 'nullable|integer|min:1',
            'kitchen'               => 'nullable|integer|min:1',
            'living_room'           => 'nullable|integer|min:0',
            'bar'                   => 'nullable|integer|min:0',
            'pool'                  => 'nullable|integer|min:0',
            'garage'                => 'nullable|integer|min:0',
            'check_in_time'         => 'nullable',
            'check_out_time'        => 'nullable',
            'adults'                => 'nullable|integer|min:1',
            'villa_rules'           => 'nullable|array',
            'villa_rules.en'        => 'nullable|required_with:villa_rules.ar|string',
            'villa_rules.ar'        => 'nullable|required_with:villa_rules.en|string',

            'signature'             => 'required',
            'payment_option'        => 'required|integer|in:0,1',
            'date_calendar'         => 'nullable',
            'date_calendar.*'       => 'nullable',
            'owner_statement_id'    => 'required',
            'owner_statement_id.*'  => 'exists:owner_statements,id',
        ]);

        DB::beginTransaction();

        try {
            $base64Image = $request->signature;
            $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);

            // Ensure price & price_type_id are arrays
            $prices = is_array($request->price) ? $request->price : [];

            $priceData = [];

            if ($prices[0] == null) {
                $priceData['price_type_id_one'] = null;
                $priceData['price'] = null;
            } else {
                $priceData['price_type_id_one'] = 1;
                $priceData['price'] = $prices[0];
            }

            if ($prices[1] == null) {
                $priceData['price_type_id_two'] = null;
                $priceData['price_two'] = null;
            } else {
                $priceData['price_type_id_two'] = 2;
                $priceData['price_two'] = $prices[1];
            }

            if ($prices[2] == null) {
                $priceData['price_type_id_three'] = null;
                $priceData['price_three'] = null;
            } else {
                $priceData['price_type_id_three'] = 3;
                $priceData['price_three'] = $prices[2];
            }

            if ($prices[3] == null) {
                $priceData['price_type_id_four'] = null;
                $priceData['price_four'] = null;
            } else {
                $priceData['price_type_id_four'] = 4;
                $priceData['price_four'] = $prices[3];
            }

            // Save Villa
            $villa = Villa::create(array_merge([
                'user_id'             => Auth::id(),
                'country_id'          => $request->country_id,
                'city_id'             => $request->city_id,
                'title'               => $request->title,
                'price'               => $request->price,
                'description'         => $request->description,
                'full_address'        => $request->full_address,
                'property_label_id'   => $request->property_label_id,
                'property_type'       => $request->property_type,
                'room'                => $request->room,
                'bathroom'            => $request->bathroom,
                'balcony'             => $request->balcony,
                'kitchen'             => $request->kitchen,
                'living_room'         => $request->living_room,
                'bar'                 => $request->bar,
                'pool'                => $request->pool,
                'garage'              => $request->garage,
                'check_in_time'       => $request->check_in_time,
                'check_out_time'      => $request->check_out_time,
                'adults'              => $request->adults,
                'villa_rules'         => $request->villa_rules,
                'signature'           => $base64Image,
                'payment_option'      => $request->payment_option,
                'slug'                => Str::slug($request->title["en"], '_') . '_' . rand(100000, 999999),
            ], $priceData));

            // Handle Villa Images Upload
            if ($request->hasFile('villa_image')) {
                foreach ($request->file('villa_image') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $imagePath = Helper::fileUpload($image, 'Villa/Villa_Images', $fileName);

                    VillaImage::create([
                        'villa_id' => $villa->id,
                        'image'    => $imagePath,
                    ]);
                }
            }

            // Attach Amenities
            if ($request->filled('amenity_id')) {
                $villa->amenities()->attach($request->amenity_id);
            }

            // Attach statement
            if ($request->filled('owner_statement_id')) {
                $villa->statements()->attach($request->owner_statement_id);
            }

            // Handle Date Offs
            if ($request->filled('date_calendar') && $request->date_calendar[0] != '') {
                $offDates = explode(', ', $request->date_calendar[0]);
                foreach ($offDates as $date) {
                    VillaOffDate::create([
                        'villa_id' => $villa->id,
                        'off_date'    => $date,
                    ]);
                }
            }

            DB::commit();

            // Fetch only necessary columns for efficiency
            $admins = User::where('role', 'admin')->select('id', 'email')->get();

            if ($admins->isNotEmpty()) {
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new AdminVillaAdd($villa));
                }
            }

            // Notify the villa owner
            Mail::to(auth()->user()->email)->send(new OwnerVillaAdd($villa));

            return redirect()->route('owner.my-listing')->with([
                'success'  => true,
                't-success'  => __('Villa added successfully'),
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->with([
                'success' => false,
                't-error' => __('Error adding villa: ') . $exception->getMessage(),
            ])->withInput();
        }
    }


    public function ownerMyListing()
    {
        $villas = Villa::where('user_id', Auth::id())->latest()->paginate(10);
        return view('frontend.layouts.owner-dashboard.layouts.my-listing', compact('villas'));
    }

    public function ownerEditVilla($id)
    {
        $data = Villa::findOrFail($id);
        $countries = Country::where('status', 'active')->orderBy('name', 'asc')->get();
        $property_labels = PropertyLabel::where('status', 'active')->latest()->get();
        $amenities = Amenity::where('status', 'active')->latest()->get();
        $off_dates = $data->dateOffs()->pluck('off_date')->toArray();
        $owner_statements = OwnerStatement::where('status', 'active')->get();
        // Fetch price types
        $price_types = PriceType::where('status', 'active')->get();

        return view('frontend.layouts.owner-dashboard.layouts.edit-villa', compact('data', 'countries', 'owner_statements', 'property_labels', 'amenities', 'off_dates', 'price_types'));
    }

    public function ownerVillaUpdate(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'villa_image.*'         => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'amenity_id.*'          => 'nullable|integer|exists:amenities,id',
            'country_id'            => 'required|integer|exists:countries,id',
            'city_id'               => 'nullable|integer|exists:cities,id',

            'title'                 => 'required|array',
            'title.en'              => 'required|required_with:title.ar|string|max:255',
            'title.ar'              => 'required|required_with:title.en|string|max:255',

            'price_type_id'         => 'required|array',
            'price_type_id.*'       => 'nullable|integer|exists:price_types,id',
            'price'                 => 'required|array',
            'price.*'               => 'nullable|numeric|min:0',

            'description'           => 'required|array',
            'description.en'        => 'required|required_with:description.ar|string',
            'description.ar'        => 'required|required_with:description.en|string',

            'full_address'          => 'required|array',
            'full_address.en'       => 'required|required_with:full_address.ar|string|max:255',
            'full_address.ar'       => 'required|required_with:full_address.en|string|max:255',

            'property_label_id'     => 'required|integer|exists:property_labels,id',
            'property_type'         => 'required|string|max:100',
            'room'                  => 'required|integer|min:1',
            'bathroom'              => 'required|integer|min:1',
            'balcony'               => 'nullable|integer|min:1',
            'kitchen'               => 'nullable|integer|min:1',
            'living_room'           => 'nullable|integer|min:0',
            'bar'                   => 'nullable|integer|min:0',
            'pool'                  => 'nullable|integer|min:0',
            'garage'                => 'nullable|integer|min:0',
            'payment_option'        => 'required|integer|in:0,1',
            'check_in_time'         => 'required',
            'check_out_time'        => 'required',
            'adults'                => 'required|integer|min:1',

            'villa_rules'           => 'nullable|array',
            'villa_rules.en'        => 'nullable|required_with:villa_rules.ar|string',
            'villa_rules.ar'        => 'nullable|required_with:villa_rules.en|string',

            'signature'             => 'nullable',
            'delete_images'         => 'nullable|array',
            'delete_images.*'       => 'integer|exists:villa_images,id',
            'date_calendar.*'       => 'nullable',
            'owner_statement_id'          => 'required', // Ensure it's an array and at least one is selected
            'owner_statement_id.*'        => 'exists:owner_statements,id', // Ensure each ID exists in the `owner_statements` table
        ]);

        DB::beginTransaction();

        try {
            // Fetch Villa
            $villa = Villa::findOrFail($id);

            // Ensure price & price_type_id are arrays
            $prices = is_array($request->price) ? $request->price : [];

            $priceData = [];

            if ($prices[0] == null) {
                $priceData['price_type_id_one'] = null;
                $priceData['price'] = null;
            } else {
                $priceData['price_type_id_one'] = 1;
                $priceData['price'] = $prices[0];
            }

            if ($prices[1] == null) {
                $priceData['price_type_id_two'] = null;
                $priceData['price_two'] = null;
            } else {
                $priceData['price_type_id_two'] = 2;
                $priceData['price_two'] = $prices[1];
            }

            if ($prices[2] == null) {
                $priceData['price_type_id_three'] = null;
                $priceData['price_three'] = null;
            } else {
                $priceData['price_type_id_three'] = 3;
                $priceData['price_three'] = $prices[2];
            }

            if ($prices[3] == null) {
                $priceData['price_type_id_four'] = null;
                $priceData['price_four'] = null;
            } else {
                $priceData['price_type_id_four'] = 4;
                $priceData['price_four'] = $prices[3];
            }

            // dd($prices, $priceData);
            //  Log::info("Price Data Before Insert: ", $priceData);

            // Update Villa Details
            $villa->update(array_merge([
                'country_id'          => $request->country_id,
                'city_id'             => $request->city_id,
                'title'               => $request->title,
                'price'               => $request->price,
                'description'         => $request->description,
                'full_address'        => $request->full_address,
                //                'map_location'        => $request->map_location,
                'property_label_id'   => $request->property_label_id,
                'property_type'       => $request->property_type,
                'room'                => $request->room,
                'bathroom'            => $request->bathroom,
                'balcony'             => $request->balcony,
                'kitchen'             => $request->kitchen,
                'living_room'         => $request->living_room,
                'bar'                 => $request->bar,
                'pool'                => $request->pool,
                'garage'              => $request->garage,
                'check_in_time'       => $request->check_in_time,
                'check_out_time'      => $request->check_out_time,
                'adults'              => $request->adults,
                //                'childrens'           => $request->childrens,
                //                'infants'             => $request->infants,
                //                'pets'                => $request->pets,
                'villa_rules'         => $request->villa_rules,
                'signature'           => $request->signature,
                'payment_option'      => $request->payment_option,
            ], $priceData));

            // Handle Villa Images Upload
            if ($request->hasFile('villa_image')) {
                // Upload new images
                foreach ($request->file('villa_image') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $imagePath = Helper::fileUpload($image, 'Villa/Villa_Images', $fileName);

                    VillaImage::create([
                        'villa_id' => $villa->id,
                        'image'    => $imagePath,
                    ]);
                }
            }

            // Update Amenities
            if ($request->filled('amenity_id')) {
                $villa->amenities()->sync($request->amenity_id); // Use sync for updating relationships
            }

            // Update statement
            if ($request->filled('owner_statement_id')) {
                $villa->statements()->sync($request->owner_statement_id); // Use sync for updating relationships
            }

            // Handle Date Offs
            if ($request->filled('date_calendar') && $request->date_calendar[0] != '') {
                // Delete old dates
                $villa->dateOffs()->delete();

                // Save new dates
                $offDates = explode(', ', $request->date_calendar[0]);
                foreach ($offDates as $date) {
                    VillaOffDate::create([
                        'villa_id' => $villa->id,
                        'off_date' => $date,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('owner.my-listing')->with([
                'success' => true,
                't-success'  => __('Villa updated successfully'),
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->with([
                'success' => false,
                't-error' => __('Error updating villa: ') . $exception->getMessage(),
            ])->withInput();
        }
    }


    public function deleteVillaImage($id)
    {
        try {
            $villaImage = VillaImage::findOrFail($id);

            // Delete image from storage
            if ($villaImage->image) {
                Helper::fileDelete($villaImage->image);
            }

            // Delete from database
            $villaImage->delete();

            return response()->json(['success' => true, 't-success' => __('Image deleted successfully')]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 't-error' => __('Failed to delete image: ') . $exception->getMessage()]);
        }
    }


    public function ownerDeleteVilla($id)
    {
        try {
            $villa = Villa::findOrFail($id);

            if (!$villa) {
                return response()->json([
                    'success' => false,
                    't-error' => __('Villa not found.'),
                ], 404);
            }

            // Delete associated images
            foreach ($villa->villa_images as $image) {
                if ($image->image) {
                    Helper::fileDelete($image->image);
                }
                $image->delete();
            }

            // Delete the villa
            $villa->delete();

            return response()->json([
                'success' => true,
                't-success' => __('Villa deleted successfully'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                't-error' => __('Failed to delete villa: ') . $e->getMessage(),
            ], 500);
        }
    }
}
