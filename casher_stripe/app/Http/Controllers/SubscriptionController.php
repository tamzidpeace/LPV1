<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use Exception;
use Laravel\Cashier\Cashier;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.create');
    }

    public function orderPost(Request $request)
    {
        return $request;
        $user = auth()->user();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        try {

            Stripe\Stripe::setApiKey('sk_test_Vxp0LjenGxgacb4KnTbxKCoi006meNozdM');

            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription('test',$input['plane'])
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

            return back()->with('success','Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }

    }

    //practice cashier
    public function cashierIndex() {
        $user = Auth::user();
        $intent = $user->createSetupIntent();
        return view('prac_cashiar', compact('intent'));
    }

}
