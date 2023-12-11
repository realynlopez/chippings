@extends('layout')
@section('title', 'Eskinita by Chippings | Menu Page')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4 mb-3">Chippings Menu</h1>
        
        <h2>Cart</h2>
        <div id="cart"></div>
        
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Lechong Manok</h3>
                <p class="card-text">Best Seller</p>
                <p class="card-text">Price: 300</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Iniaw Boneless Bangus</h3>
                <p class="card-text">Best Seller</p>
                <p class="card-text">Price: 235</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Liempo</h3>
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
                let item = btn.parentElement.querySelector('.card-title').innerText;
                addToCart(item);
            });
        });
    </script>
</body>
</html>

@endsection