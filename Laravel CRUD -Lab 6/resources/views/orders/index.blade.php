@extends('layout')

@section('title', 'Orders')

@section('content')
<h1>Orders</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add Order</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>${{ number_format($order->total, 2) }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection