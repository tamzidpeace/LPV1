<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class AjaxRestController extends Controller
{
    public function index()
    {
        return view('ajax_rest');
    }

    public function getData(Request $request)
    {
        try {
            $customer = Customer::findOrFail($request->id);
            return \response()->json($customer);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function autoSearch(Request $request) {
        $result = Customer::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return \response()->json($result);
    }
}
