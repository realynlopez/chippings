<!-- resources/views/checkout/index.blade.php -->

@extends('admin.admin-layout')
@extends('user.header')
@section('title', 'User Checkout')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Checkout</h2>
                <form action="{{ route('checkout.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <!-- Add other form fields as needed -->
                    <form action="{{ route('checkout.placeOrder') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Place Order</button>
                        </div>
                    </form>

                    
                </form>
            </div>
        </div>
    </div>
@endsection
