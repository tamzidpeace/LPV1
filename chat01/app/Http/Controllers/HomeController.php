<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rawilk\Printing\Facades\Printing;
// use Rawilk\Printing\Contracts\Printer;
use Rawilk\Printing\Receipts\ReceiptPrinter;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class HomeController extends Controller
{
    use ActivityLogger;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome() {
        return view('welcome');
    }

    public function testPrint2()
    {
        // $printerId = Printing::defaultPrinterId();

        // Printing::newPrintTask()
        // ->printer($printerId)
        // ->file('Scan_Info.pdf')
        // ->send();
        //69972550
        //69972549

        $receipt = (string) (new ReceiptPrinter)
        ->centerAlign()
        ->text('My heading')
        ->leftAlign()
        ->line()
        ->twoColumnText('Item 1', '2.00')
        ->twoColumnText('Item 2', '4.00')
        ->feed(2)
        ->centerAlign()
        ->barcode('1234')
        ->cut();

        Printing::newPrintTask()
        ->printer(69972550)
        ->content($receipt)
        ->send();
    }

    public function testPrint3()
    {


        $connector = new WindowsPrintConnector("EPSON TM-T81III Receipt");
        $printer = new Printer($connector);
        $printer->setPrintLeftMargin(300);
        $printer -> text("Hello World!\n");
        $printer->qrCode(123,Printer::QR_ECLEVEL_L,10);
        $printer -> cut();
        $printer -> close();

        //return view('test_print2');
    }
}
