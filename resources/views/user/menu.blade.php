<!-- resources/views/menu.blade.php -->

@extends('admin.admin-layout')
@section('title', 'Eskinita by Chippings | Menu Page')
@extends('user.header')

@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
    <style>
        .menu-card-title {
            font-size: 1.5rem; /* Adjust the font size as needed */
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4 mb-3 justify-content-center">
        <h1 class="text-center mt-4 mb-3">Chippings Menu</h1>

        <div id="cart">
            <h3 class="text-center mt-4 mb-3">Cart Items</h3>
            <table class="table">
                <tbody id="cart-items-body">
                    <!-- Cart items will be displayed here -->
                </tbody>
            </table>
        </div>
        
        <h3>Menu</h3>

        @foreach($menuItems as $menuItem)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="menu-card-title">{{ $menuItem->name }}</h3>
                    <p class="card-text">{{ $menuItem->description }}</p>
                    <p class="card-text">Price: {{ $menuItem->price }}</p>
                    
                    <!-- Display image if available -->
                    @if($menuItem->image)
                        <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    @else
                        No Image
                    @endif

                    <a href="#" class="btn btn-primary" onclick="addToCart('{{ $menuItem->name }}')">Add to cart</a>
                </div>
            </div>
        @endforeach

        <script src="{{ asset('assets/js/cart.js') }}"></script>
    </div>
@endsection
