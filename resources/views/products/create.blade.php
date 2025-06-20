@extends('layouts.admin')

@section('title', 'edit products')

@section('content')


    <h1>Nieuw Product Toevoegen</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="modern-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" class="modern-input" required>

        <label>Description:</label>
        <textarea name="description" class="modern-input"></textarea>

        <label>Over Product:</label>
        <textarea name="overProduct" class="modern-input"></textarea>

        <label>Price (€):</label>
        <input type="number" name="price" step="0.01" class="modern-input" required>

        <label id="fileImage" for="file">picture</label>
        <input type="file" id="file" name="image" accept="image/*">

        <button class="modern-button" type="submit">Save</button>
    </form>

@endsection