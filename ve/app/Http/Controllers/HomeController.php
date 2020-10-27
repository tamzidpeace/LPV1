<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;

use DateTimeZone;

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
        $auth_token = "781116e22bca85aec7ee1f7eacdd0c2d";
        $twilio_number = "+18035605388";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
        return 123;
    }

    public function sendEmail() {
        $email = 'positronx@gmail.com';
   
        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));
   
        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }

    public function timeZone() {

        $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        
        return view('test.test', \compact('timezonelist'));
    }
}
