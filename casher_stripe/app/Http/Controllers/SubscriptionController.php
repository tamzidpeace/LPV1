<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $token = $request->stripeToken;
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

            $user->newSubscription('test', $input['plane'])
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

            return back()->with('success', 'Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success', $e->getMessage());
        }

    }

    //practice cashier
    public function cashierIndex()
    {
        $user = Auth::user();

        /*$paymentMethod2 = 'pm_1IV6oxFOGLyEH2rNOGz2Xqq5';


        try {
            $user->charge(100, $paymentMethod2);
            return 1;
        } catch (Exception $e) {
            return $e;
        }*/

        $payment_methods = [];

        foreach ($user->paymentMethods() as $paymentMethod) {
            $payment_methods[] = $paymentMethod->asStripePaymentMethod();
        }

        try {
            $user->charge(100 * 100, $payment_methods[0]);
            return 1;
        } catch (Exception $e) {
            return $e;
        }

        $intent = $user->createSetupIntent();
        return view('prac_cashiar', compact('intent'));
    }

    public function cashierProcess(Request $request)
    {
        $user = Auth::user();

        $paymentMethod = $request->pm;
        $paymentMethod2 = 'pm_1IV6oxFOGLyEH2rNOGz2Xqq5';


        try {
            $user->charge(100, $paymentMethod2);
            return 1;
        } catch (Exception $e) {
            return $e;
        }
    }

}
