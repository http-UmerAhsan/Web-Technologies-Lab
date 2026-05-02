@extends('layout')

@section('title', 'Edit Customer')

@section('content')
<h1>Edit Customer</h1>
<form action="{{ route('customers.update', $customer) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection