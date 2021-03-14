<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rawilk\Printing\Facades\Printing;

class TestController extends Controller
{
    public function testPrinter()
    {
        Printing::defaultPrinterId();
    }

    public function printNode() {
        return \view('test');
    }
}
