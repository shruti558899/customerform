<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class razorpaycontroller extends Controller
{
    public function showform()
    {
        return view('razorpay');
    }


    public function store(Request $request)
    {
         $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
         //dd(config('services.razorpay.key'), config('services.razorpay.secret'));

        // Create an order
        $order = $api->order->create([
            'receipt' => 'order_rcptid_11',
            'amount' => $request->input('amount') * 100, // Amount in paise
            'currency' => 'INR',
        ]);
        print_r($order);
        //return view('razorpay', ['order' => $order]);
    }
    
}
