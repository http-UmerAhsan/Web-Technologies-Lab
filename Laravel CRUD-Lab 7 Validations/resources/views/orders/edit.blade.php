@extends('layout')

@section('title', 'Edit Order')

@section('content')
<h1>Edit Order</h1>
<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Customer</label>
        <select name="customer_id" class="form-control" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Total</label>
        <input type="number" step="0.01" name="total" class="form-control" value="{{ $order->total }}" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection