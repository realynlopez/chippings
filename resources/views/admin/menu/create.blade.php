<!-- resources/views/admin/menu/show.blade.php -->

@extends('admin.admin-layout')

@section('title', 'Product Details')

@section('content')

    <h1>Product Details</h1>

    <div>
        <h2>{{ $product->name }}</h2>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <p>Category: {{ $product->category }}</p>
        <p>Stock: {{ $product->stock }}</p>
        <!-- Add more details as needed -->
    </div>

@endsection
