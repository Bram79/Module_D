<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\DB;

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
                'success_url' => route('checkout.succes') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cart.show'),
            ]);



            return redirect($session->url, 303);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Unable to create payment session: ' . $e->getMessage()]);
        }
    }

    public function succes()
    {
        $user = auth()->user();

        $cartItems = $user->cartItems;

        if ($cartItems->isEmpty()) {
            return view('shoppingcart')->with('message', 'No items in cart.');
        }

        $order = null;

        DB::transaction(function () use ($user, $cartItems, &$order) {
            $totalPrice = $cartItems->reduce(function ($carry, $item) {
                return $carry + ($item->product->price * $item->quantity);
            }, 0);

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'completed',
                'total_price' => $totalPrice,
            ]);

            foreach ($cartItems as $item) {
                $order->products()->attach($item->product_id, ['quantity' => $item->quantity]);
            }

            Cart::where('user_id', $user->id)->delete();
        });

        return view('shoppingcart', [
            'order' => $order
        ]);
    }


}