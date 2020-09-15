<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{    
    public function home()
    {       
        return view('customer');
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();
        return \response()->json("New Customer Created!");
    }
}
