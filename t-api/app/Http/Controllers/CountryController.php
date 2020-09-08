<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    function country() {
        return response()->json(Country::get(), 200);
    }
}
