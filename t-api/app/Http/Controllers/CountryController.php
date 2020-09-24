<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function country()
    {
        return response()->json(Country::get(), 200);
    }

    public function countryById($id)
    {
        $country = Country::findOrFail($id);
        if (\is_null($country)) {
            return \response()->json('Nothing Found!', 404);
        }
        
        return response()->json($country, 200);
    }

    public function createCountry(Request $request)
    {
        $country = new Country;

        $country->name = $request->name;
        $country->capital = $request->capital;

        $country->save();

        return response()->json("entry added", 201);
    }

    public function updateContry(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        
        if($country) return 123;
        else return 0;
        // if (isset($country)) {
        //     $country->name = $request->name;
        //     $country->capital = $request->capital;

        //     $country->save();

        //     return response()->json($country, 200);
        // }

        // return \response()->json('Nothing Found!', 404);
    }

    public function deleteCountry($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        
        return response()->json('Record Deleted', 204);
    }
}
