<?php

use Illuminate\Support\Facades\Route;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('printer', function () {
    $connector = new WindowsPrintConnector("EPSON TM-T81III Receipt");
    $printer = new Printer($connector);
    $printer->setPrintLeftMargin(300);
    $printer->text("Hello World!\n");
    //$printer->qrCode(123, Printer::QR_ECLEVEL_L, 10);
    $printer->cut();
    $printer->close();
});

Route::get('p2', 'TestController@testPrinter');
Route::get('pn', 'TestController@printNode');
