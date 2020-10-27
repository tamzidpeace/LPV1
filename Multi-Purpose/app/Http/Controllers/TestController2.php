<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController2 extends Controller
{
    public function st() {
        //return back()->with('message', 'Updated.');
        return view('sweetalert.index')->with('message', 'Updated.');
    }
}
