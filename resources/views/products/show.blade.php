@extends('layouts.app')

@section('title', $product->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')
    <div class="product-show">
        <div class="product-left">

            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @endif
        </div>

        <div class="product-right">
            <h1>{{ $product->name }}</h1>
            <hr>
            <p><strong>Price:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
            <p>{{ $product->overProduct }}</p>
            <hr>

            <a href="#" class="product-button"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> Add to
                Cart</a>
            <a href="#" class="product-button2"><i class="fa fa-heart" style="color: #000000"></i> Add
                wishlist</a>
            <hr>
            <h4>Description</h4>
            <p>{{ $product->description}}</p>
        </div>

        {{-- <div class="product-review">
            <input type="textarea" name="">
        </div> --}}
    </div>

@endsection