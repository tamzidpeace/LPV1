<?php

namespace App\Http\Controllers;

use App\customer;
use App\Order;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function index()
    {
        return view('index');
    }

    function store(Request $request) {
        return $request;
    }

    function dropDown() {
        $customers = customer::all();
        return view('dropdown', compact('customers'));
    }

    function getOrders(Request $get) {

        $orders = Order::where('customer_id', $get->data)->get();
        //return $orders;
        $html = '';
        foreach ($orders as $city) {
            $html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        return response()->json(['orders' => $html]);
    }
}
