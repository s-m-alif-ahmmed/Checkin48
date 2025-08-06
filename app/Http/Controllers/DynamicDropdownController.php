<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class DynamicDropdownController extends Controller
{
    public function getCitiesByCountry(Request $request)
    {
        $countryId = $request->input('country_id');
        $cities = City::where('country_id', $countryId)->get();

        return response()->json($cities);
    }

    public function getStatesByCity(Request $request)
    {
        $cityId = $request->input('city_id');
        $states = State::where('city_id', $cityId)->get();

        return response()->json($states);
    }
}
