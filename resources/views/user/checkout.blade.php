<!-- resources/views/checkout/index.blade.php -->

@extends('layout')

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
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>

                    
                </form>
            </div>
        </div>
    </div>
@endsection
