<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemoController extends Controller
{
    public function makeRefund(Request $request, $casavaReference)
    {
        $paystackrefundEndpoint = env('PAYSTACK_URL') . "/refund";

        $response = Http::withHeaders([
            'authorization: Bearer YOUR_SECRET_KEY',
            'cache-control: no-cache',
            'content-type: application/json',
        ])->post($paystackrefundEndpoint, [
            'transaction' => $casavaReference,
            'amount' => '1000'
        ]);

        return $response->body();
    }

    public function makePayment()
    {
      return view('payment');
    }

}
