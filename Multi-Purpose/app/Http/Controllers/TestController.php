<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Customer;
use DateTime;

class TestController extends Controller
{
    public function test()
    {
        $products = Product::all();
        return view('test', compact('products'));
    }

    public function allData()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function saveProduct(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response()->json("success");
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }

    public function test3()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    public function test2()
    {
        $products = User::all();
        return $products;
    }

    public function test4()
    {
        $x = config('calculations.some_key');
        return $_SERVER['SERVER_NAME'];
    }

    public function blade()
    {
        $records = Customer::all();
        return view('student.index', \compact('records'));

    }

    public function bladeForm(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required',],
            'email' => ['required'],
        ]);

        $customer = new Customer;
       

        $customer->name = $request->name;
        $customer->email = $request->email;
        
        return view('student.index', compact('records'));
    }

    public function date()
    {
        $d=mktime(0, 0, 0, date('m'), date('d'), date('Y'));        
        $today = date("Y-m-d H:i:s", $d);
        $yesterday = new DateTime('1 day ago');
        $date = new DateTime('30 days ago');
        $month_ago = $date->format('Y-m-d');
        $date = new DateTime('7 days ago');
        $week_ago = $date->format('Y-m-d');
        $customer = Customer::where('id', 60)->first();

        return $today_records = Customer::where([['id', $customer->id], ['created_at', '>=' , $today]])->count();
        $week_records = Customer::where([['created_at', '>=' , $week_ago], ['id', $customer->id]])->count();
        return $month_records = Customer::where([['id', $customer->id], ['created_at', '>=' , $month_ago]])->count();
    }

    public function dataTable() {
        $customers = Customer::all();

        return view('student.data_table', \compact('customers'));
    }
}
