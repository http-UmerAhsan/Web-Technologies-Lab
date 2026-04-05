@extends('layout')

@section('title', 'Order Details')

@section('content')
<h1>Order #{{ $order->id }}</h1>
<p><strong>Customer:</strong> {{ $order->customer->name }}</p>
<p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
<h3>Order Details</h3>
@if($order->orderDetails->count() > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->orderDetails as $detail)
        <tr>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>${{ number_format($detail->price, 2) }}</td>
            <td>${{ number_format($detail->quantity * $detail->price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No order details yet.</p>
@endif
<a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
@endsection