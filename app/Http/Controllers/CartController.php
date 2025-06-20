<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('showPopup', 'popup-signin');

        }

        $user = auth()->user();
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity >= 2) {
                return back();
            }
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back();
    }



    public function showCart(Request $request)
    {
        $user = auth()->user();

        $cartItems = collect();
        $total = 0;

        if ($user) {
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();

            foreach ($cartItems as $item) {
                $total += $item->product->price * $item->quantity;
            }
        }

        return view('shoppingcart', compact('cartItems', 'total'));
    }


    public function updateQuantity(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        if ($request->action === 'increase' && $item->quantity < 2) {
            $item->quantity++;
        } elseif ($request->action === 'decrease') {
            $item->quantity--;
            if ($item->quantity < 1) {
                return $this->remove($id);
            }
        }

        $item->save();
        return redirect()->route('cart.show');
    }


    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.show');
    }

    public function showPayments()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntents = PaymentIntent::all([
            'limit' => 20,
        ]);

        return view('admin.payments', compact('paymentIntents'));
    }
}
