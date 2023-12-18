<!-- resources/views/checkout/index.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <form action="{{ route('checkout.store') }}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <!-- Add other form fields as needed -->
            <br>
            <button type="submit">Proceed to Checkout</button>
        </form>

        <form action="{{ route('checkout.placeOrder') }}" method="post">
            @csrf
            <!-- Include form fields for user_id, shipping_address, and other order details -->

            <button type="submit">Place Order</button>
        </form>
    </div>
@endsection
