<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer as MikePrinter;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;

class TestController extends Controller
{
    public function testPrinter()
    {
        $connector = new WindowsPrintConnector('EPSON TM-T81III Receipt');
        $printer = new MikePrinter($connector);
        $printer->setPrintLeftMargin(100);
        $printer->text("Printer Connected!\n");
        //$printer->qrCode('Success', MikePrinter::QR_ECLEVEL_L, 5);
        $printer->cut();
        $printer->close();
        return 'success';
    }
}
