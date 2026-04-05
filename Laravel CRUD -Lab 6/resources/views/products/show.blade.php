@extends('layout')

@section('title', 'Product Details')

@section('content')
<h1>{{ $product->name }}</h1>
<p><strong>Description:</strong> {{ $product->description }}</p>
<p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
<p><strong>Stock:</strong> {{ $product->stock }}</p>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
@endsection