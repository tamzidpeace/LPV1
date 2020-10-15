<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class HomeController extends Controller
{
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

    public function qr()
    {
        return QrCode::size(150)->color(82, 206, 157)->generate('Sakib Vai!');
    }

    public function sms()
    {
        $recipients = "+8801303792406";
        $message = "testing sms2";
        $account_sid = "ACdfd3039d1faac554730b592c95ee0120";
        $auth_token = "4fa2ba0026a3fcdf82d722e5d1bea0ab";
        $twilio_number = "+18035605388";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
        return 123;
    }
}
