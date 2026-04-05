@extends('layout')

@section('title', 'Customer Details')

@section('content')
<h1>{{ $customer->name }}</h1>
<p><strong>Email:</strong> {{ $customer->email }}</p>
<p><strong>Phone:</strong> {{ $customer->phone }}</p>
<p><strong>Address:</strong> {{ $customer->address }}</p>
<a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
@endsection