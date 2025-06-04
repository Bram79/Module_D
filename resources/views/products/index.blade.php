@extends('layouts.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')
    <div class="products-grid">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product) }}" class="product-card">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @endif
                <div class="product-info">
                    <div class="product-name">{{ $product->name }}</div>
                    <div class="product-price">€{{ number_format($product->price, 2, ',', '.') }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection