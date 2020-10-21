<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;

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
        $recipients = "+16125173042";
        $message = "testing sms2";
        $account_sid = "AC163091a9657e70284fd1d6bdbfb9430c";
        $auth_token = "3f6e79c8fe80cc371e4de87098930754";
        $twilio_number = "+12015810178";
        //$twilio_number = "+1(612) 517-3042";
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
}
