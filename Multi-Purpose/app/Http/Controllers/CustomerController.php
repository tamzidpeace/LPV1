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

    public function view()
    {
        $customers = Customer::all();
        return \response()->json($customers);
    }

    public function store(Request $request)
    {
        try {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->save();
            return \response()->json("success");
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function viewSingle(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        return response()->json($customer);
    }

    public function destroy(Request $request) {
        $customer = Customer::findOrFail($request->id);
        $customer->delete();
        return response()->json('success');
    }

    public function edit(Request $request) {
        
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();
        return response()->json("success");
    }
}
