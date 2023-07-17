<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class StripeController extends Controller
{
    //
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    { 
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $productname = $request->get('book_name');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        $productname = $request->get('book_name');
        $totalprice = $request->get('unit_amount');
        $two0 = "00";
        $total = "$totalprice$two0";
        $user=auth()->id();
        // $amount = session('line_items')['unit_amount'];
            $data = Order::create([
                'order_amount' => '000',
                'order_status' => 'pending',
                'user_id' => $user,
                
            ]);
    
       

        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
}

    
