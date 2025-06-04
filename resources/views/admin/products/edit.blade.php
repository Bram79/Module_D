@extends('layouts.admin')

@section('content')
    <form class="modern-form" method="POST" action="{{ route('admin.products.update', $product) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>user edit</h1>
        <div>
            <input class="modern-input" type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div>
            <input class="modern-input" type="number" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div>
            <input class="modern-input" type="text" name="overProduct"
                value="{{ old('overProduct', $product->overProduct) }}">
        </div>

        <div>
            <input class="modern-input" type="text" name="description"
                value="{{ old('description', $product->description) }}">
        </div>

        @if ($product->image)
            <div class="image-preview-container">
                <label>Current picture</label>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product afbeelding">
            </div>
        @endif


        <div>
            <label id="fileImage" for="file">New picture</label>
            <input type="file" id="file" name="image" accept="image/*">
        </div>

        <a href="{{ route('admin.products.index') }}">← back to list</a>
        <button class="modern-button" type="submit">save</button>
    </form>
@endsection