@extends('admin.admin-layout')
@section('title', 'Eskinita by Chippings | Menu Page')
@extends('user.header')

@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user_menu.css') }}" rel="stylesheet">
    <style>
        /* Your additional styles go here */
    </style>
@endsection

@section('content')
    <div class="container mt-4 mb-3 justify-content-center">
        <h1 class="text-center mt-4 mb-3">Chippings Menu</h1>

        <div id="cart">
            <h3 class="text-center mt-4 mb-3">Cart Items</h3>
            <!-- Calculate total amount -->
            @php
                $totalAmount = 0;
            @endphp
            <table class="table">
                <thead>        
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th> 
                        <!-- Add other columns as needed -->
                    </tr>        
                </thead>
                <tbody id="cart-items-body">
                    @if(session('cart'))
                        @foreach(session('cart') as $itemId => $item)
                            @php
                                $totalAmount += $item['price'] * $item['quantity'];
                            @endphp
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>
                                    <form action="{{ route('user.menu.removeOneFromCart', ['id' => $itemId]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>                           
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td>Total Amount:</td>
                            <td class="cart-total-amount">PHP {{ $totalAmount }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td> <!-- Updated colspan to 3 -->
                            <td>
                                <form action="{{ route('checkout.store') }}" method="post">
                                    @csrf
                                    <!-- Your form fields go here -->
                                    <a href="{{ route('checkout.index') }}" class="btn btn-success mt-2">Checkout</a>
                                </form>
                            </td>
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>

        <!--menu-->
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

                        <form action="{{ route('user.menu.addToCart') }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $menuItem->id }}">
                            <input type="hidden" name="quantity" value="1"> <!-- You can set a default quantity if needed -->
                            <!-- Add any other necessary hidden fields -->
                            <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                        </form>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
