<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    function country() {
        return response()->json(Country::get(), 200);
    }

    function countryById($id) {
        $country = Country::findOrFail($id);
        
        return response()->json(Country::find($id), 200);
    }

    function createCountry(Request $request) {
        
        $country = new Country;

        $country->name = $request->name;
        $country->capital = $request->capital;

        $country->save();

        return response()->json("entry added", 201);

    }

    function updateContry(Request $request, $id) {
        $country = Country::findOrFail($id);

        $country->name = $request->name;
        $country->capital = $request->capital;

        $country->save();

        return response()->json($country, 200);
    }

    function deleteCountry($id) {
        $country = Country::findOrFail($id);
        $country->delete();
        
        return response()->json('Record Deleted', 204);
    }
}
