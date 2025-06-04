@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Over Product</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{"€" . $product->price }}</td>
                    <td>{{ $product->overProduct }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="50"></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="table-links">
        {{ $products->links() }}
    </div>
@endsection