<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function paymentProcess() {
        Stripe::setApiKey('sk_test_Vxp0LjenGxgacb4KnTbxKCoi006meNozdM');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
    }
}
