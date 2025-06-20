@extends('layouts.app')

@section('title', $product->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')
    <div class="product-show">
        <div class="product-main">
            <div class="product-left">

                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @endif
            </div>

            <div class="product-right">
                <h1>{{ $product->name }}</h1>
                <hr>
                <p>
                    <strong>Price:</strong> €{{ number_format($product->price, 2, ',', '.') }}
                    @if ($product->averageRating)
                        <span style="color: #888;"> &nbsp; | &nbsp; Rating: {{ $product->averageRating }} / 5 &#9733;</span>
                    @endif
                </p>
                <p>{{ $product->overProduct }}</p>
                <hr>

                @auth
                    <form method="POST" action="{{ route('cart.add', $product->id) }}">
                        @csrf
                        <button class="product-button" type="submit"><i class="fa-solid fa-cart-shopping"
                                style="color: #000000;"></i> Add to Cart</button>
                    </form>
                @else
                    <button class="product-button" onclick="openPopup('popup-signin')"><i class="fa-solid fa-cart-shopping"
                            style="color: #000000;"></i> Add to Cart</button>
                @endauth

                <hr>
                <h4>Description</h4>
                <p>{{ $product->description}}</p>
            </div>
        </div>


        <div class="product-reviews">
            <h2>Reviews</h2>

            @if (Auth::check())
                <form action="{{ route('reviews.store', $product) }}" method="POST">
                    @csrf
                    <textarea name="content" placeholder="Je review..." required></textarea><br>
                    <input type="number" name="rating" min="1" max="5" placeholder="star (1-5) &#9733;" required><br>
                    <button type="submit">send</button>
                </form>
            @else
                <a href="#" onclick="openPopup('popup-signin')">Sign in to write a review!</a>
            @endif

            @foreach ($product->reviews as $review)
                <div class="review">
                    <strong>{{ $review->user->name }}</strong>
                    <div>Star: {{ $review->rating }}/5 &#9733;</div>
                    <p>{{ $review->content }}</p>

                </div>
            @endforeach
            <hr>
        </div>


    </div>
@endsection