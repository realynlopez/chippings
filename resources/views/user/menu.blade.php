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

        /* Add custom styles for positioning buttons */
        .card-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px; /* Adjust the margin as needed */
        }

        .card-buttons a {
            margin-right: 10px;
        }

        /* Add custom styles for grid layout */
        .menu-container {
            display: flex;
            flex-wrap: wrap;
        }

        .menu-item {
            width: 25%;
            padding: 15px;
            box-sizing: border-box;
            margin-right: 10px;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4 mb-3 justify-content-center">
        <h1 class="text-center mt-4 mb-3">Chippings Menu</h1>

        <div id="cart">
            <!--<h3 class="text-center mt-4 mb-3">Cart Items</h3>-->
            <table class="table">
                <tbody id="cart-items-body">
                    <!-- Cart items will be displayed here -->
                </tbody>
            </table>
        </div>
        
        <!--<h3>Menu</h3>-->

        <div class="menu-container">
            @foreach($menuItems as $menuItem)
                <div class="card mb-3 menu-item">
                    <div class="card-body justify-content-center">
                        <h3 class="menu-card-title">{{ $menuItem->name }}</h3>
                        <p class="card-text">{{ $menuItem->description }}</p>
                        <p class="card-text">Price: {{ $menuItem->price }}</p>
                        
                        <!-- Display image if available -->
                        @if($menuItem->image)
                            <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else
                            No Image
                        @endif

                        <div class="card-buttons">
                            <a href="#" class="btn btn-primary" onclick="addToCart('{{ $menuItem->name }}')">Add to cart</a>
                            
                            <!-- Move the meta tag outside the loop -->
                            <meta name="cart-route" content="{{ route('user.menu.addToCart') }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="{{ route('checkout.store') }}" method="post">
            @csrf
            <!-- Your form fields go here -->
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</button>
        </form>

        <script src="{{ asset('assets/js/cart.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.js"></script>
        <script>
            window.Echo.channel('cart-updates')
                .listen('ItemAddedToCart', (event) => {
                    // Update your user UI here
                    console.log(`Item ${event.itemName} added to cart`);
                });
        </script>
    </div>
@endsection
