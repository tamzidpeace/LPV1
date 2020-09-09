<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class TestController extends Controller
{
    function test() {
        $products = Product::all();
        return view('test', compact('products'));
    }

    function allData() {
        $products = Product::all();
        return response()->json($products);
    }

    function saveProduct(Request $request) {
       $product = new Product();

       $product->name = $request->name;
       $product->price = $request->price;
       $product->save();

       return response()->json("success");

    }

    function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }

    function test3() {
        $user = User::all();
        return response()->json($user, 200);
    }

    function test2() {
        $products = User::all();
        return $products;
    }
}
