<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function test()
    {
        return view('layouts.jquery');

    }
}
