@extends('layouts.app')

@section('title', 'Shopping Cart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <div class="cart-container">
        <h1 class="cart-title">Shopping Cart</h1>

        @if(!empty($cartItems) && count($cartItems) > 0)
            <div class="cart-wrapper">
                <!-- Cart Items -->
                <div class="cart-items">
                    @foreach($cartItems as $item)
                        <div class="cart-item">
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                class="cart-image">

                            <div class="cart-details">
                                <h2 class="cart-product-title">{{ $item->product->name }}</h2>
                                <p class="cart-product-price">
                                    €{{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}</p>

                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="cart-quantity-form">
                                    @csrf
                                    <button type="submit" name="action" value="decrease">−</button>
                                    <input type="text" value="{{ $item->quantity }}" readonly>
                                    <button type="submit" name="action" value="increase">+</button>
                                </form>

                                <p class="cart-stock">On stock</p>
                            </div>

                            <div class="cart-remove">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="remove-btn">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Summary -->
                <div class="cart-summary">
                    <h3>Payment</h3>
                    <p>Items ({{ count($cartItems) }}) <span>€{{ number_format($total, 2, ',', '.') }}</span></p>
                    <p>Shipping <span class="shipping-free">€0,00</span></p>
                    <hr>
                    <p class="cart-total">Totaal <span>€{{ number_format($total, 2, ',', '.') }}</span></p>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="checkout-btn">Checkout</button>
                    </form>

                    <div class="payment-methods">
                        <img src="{{ asset('assets/images/mastercard.png') }}" alt="MasterCard">
                        <img src="{{ asset('assets/images/visa.png') }}" alt="Visa">
                        <img src="{{ asset('assets/images/amex.png') }}" alt="Amex">
                        <img src="{{ asset('assets/images/applepay.png') }}" alt="Apple pay">
                    </div>

                    <p class="afterpay-note">Chose ur way to pay</p>
                </div>
            </div>
        @else
            <p>Your shopping cart is emty.</p>
        @endif
    </div>
@endsection