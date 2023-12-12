<!-- resources/views/menu.blade.php -->

@extends('layout')
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
        
        <h2>Cart</h2>
        <div id="cart"></div>
        
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="menu-card-title">Lechong Manok</h3>
                <p class="card-text">Best Seller</p>
                <p class="card-text">Price: 300</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="menu-card-title">Inihaw Boneless Bangus</h3>
                <p class="card-text">Best Seller</p>
                <p class="card-text">Price: 235</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="menu-card-title">Liempo</h3>
                <p class="card-text">Best Seller</p>
                <p class="card-text">Price: 230</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
        </div>

        <!-- Add more menu items here -->

    </div>

    <script>
        // This script will handle adding items to the cart.
        // You will need to connect this with your backend to handle the actual adding to cart.

        function addToCart(item) {
            // This will be a server request in a real application.
            // Here is just a placeholder to show what would happen.
            document.getElementById('cart').innerHTML += `<p>${item} added to cart</p>`;
        }

        document.querySelectorAll('.btn-primary').forEach(btn => {
            btn.addEventListener('click', () => {
                let item = btn.parentElement.querySelector('.menu-card-title').innerText;
                addToCart(item);
            });
        });
    </script>
@endsection
