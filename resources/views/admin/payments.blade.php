@extends('layouts.admin')

@section('title', 'Orders Admin')

@section('content')

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user->id }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            €{{ number_format(
                    $order->products->reduce(function ($carry, $product) {
                        return $carry + ($product->price * $product->pivot->quantity); }, 0),
                    2,
                    ',',
                    '.'
                ) }}
                        </td>
                        <td>
                            <details>
                                <summary>View products</summary>
                                <ul>
                                    @foreach ($order->products as $product)
                                        <li>
                                            {{ $product->name }} (x{{ $product->pivot->quantity }})
                                        </li>
                                    @endforeach
                                </ul>
                            </details>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endsection