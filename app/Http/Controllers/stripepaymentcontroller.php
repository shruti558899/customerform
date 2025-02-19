<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class stripepaymentcontroller extends Controller
{
     public function showForm()
    {
        return view('payment');  // Payment form view
    }

    // Process the payment
    public function processPayment(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create the charge
            $charge = Charge::create([
                'amount' => 1000, // Amount in cents ($10)
                'currency' => 'usd',
                'source' => $request->stripeToken, // Stripe token from the form
                'description' => 'Test Payment from Laravel App',
                'receipt_email' => $request->email,
            ]);

            // If the payment was successful, you can return a success message or redirect
            return back()->with('success_message', 'Payment successful!');

        } catch (Exception $e) {
            // If there was an error, catch it and return the error message
            return back()->with('error_message', $e->getMessage());
        }
    }
}
