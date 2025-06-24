@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')
    <div class="headerMain">
        <img src="{{ asset('assets/images/Header.png') }}" alt="Logo">
    </div>
    <h1>popular</h1>

    @include('partials.best-sold')

@endsection