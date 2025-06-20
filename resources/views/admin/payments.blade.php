@extends('layouts.admin')

@section('title', 'Oders admin')

@section('content')
    <h2>Payments</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Ordered</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentIntents->data as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>€{{ $payment->amount / 100 }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ \Carbon\Carbon::createFromTimestamp($payment->created)->toDateTimeString() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection