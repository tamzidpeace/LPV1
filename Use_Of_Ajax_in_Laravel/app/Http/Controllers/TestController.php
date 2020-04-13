<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function test()
    {
        $aa = [
            [
                'name' => 'one',
                'num' => 1,
            ],
            [
                'name' => 'two',
                'num' => 2,
            ]
        ];


        $orders = Order::all();
        //return gettype($aa);

        if (is_array($aa)) {
            foreach ($aa as $item) {
                return $item['name'];
            }
        }

        foreach ($orders as $order) {
            return $order;
        }

    }
}
