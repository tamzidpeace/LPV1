<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    function test() {
        $products = Product::all();
        return view('test', compact('products'));
    }

    function saveProduct(Request $request) {
       $product = new Product();

       $product->name = $request->name;
       $product->price = $request->price;
       $product->save();

       return back();

    }

    function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }
}
