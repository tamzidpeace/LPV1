<?php

namespace App\Http\Controllers;

use App\Mail\TestAmazonSes;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use Mail;
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

    public function welcome()
    {
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

        $receipt = (string)(new ReceiptPrinter)
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
       /* $connector = new WindowsPrintConnector("Receipt Printer");
        $printer = new Printer($connector);
        $printer->setPrintLeftMargin(300);
        $printer->text("Hello World!\n");
        //$printer->qrCode(123, Printer::QR_ECLEVEL_L, 10);
        $printer->cut();
        $printer->close();

        //return view('test_print2');*/

        try {
            // Enter the share name for your printer here, as a smb:// url format
            $connector = new WindowsPrintConnector("smb://Genie1/Receipt Printer");
            //$connector = new WindowsPrintConnector("smb://Guest@computername/Receipt Printer");
            //$connector = new WindowsPrintConnector("smb://FooUser:secret@computername/workgroup/Receipt Printer");
            //$connector = new WindowsPrintConnector("smb://User:secret@computername/Receipt Printer");

            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $printer -> text("Hello World!\n");
            $printer -> cut();

            /* Close printer */
            $printer -> close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }

    public function payment()
    {
        return view('payment');
    }

    public function testEmail()
    {
        Mail::to('tamjedpeace@gmail.com')->send(new TestAmazonSes('Hello World!'));

        return 123;
//        Mail::send('emails.activation', $data, function($message){
//            $message->from('email@from', 'name');
//            $message->to($email)->subject($subject);
//        });
    }
}
