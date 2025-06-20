<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function index()
    {
        return view('shoppingcart');
    }

    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cartItems = auth()->user()->cartItems;

        $lineItems = [];

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->product->price * 100, // In centen!
                ],
                'quantity' => $item->quantity,
            ];
        }

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.succes'),
                'cancel_url' => url()->previous(),
            ]);

            return redirect($session->url, 303);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Unable to create payment session: ' . $e->getMessage()]);
        }
    }

    public function succes()
    {
        Cart::where('user_id', auth()->id())->delete();
        return view('shoppingcart');
    }


}