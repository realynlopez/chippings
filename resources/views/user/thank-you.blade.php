<!-- user/thank_you.blade.php -->

@extends('layout') <!-- Make sure to extend the appropriate layout if you have one -->
@section('title', 'Eskinita By Chippings')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thank You!</div>

                    <div class="card-body">
                        <p>Your order has been placed successfully.</p>
                        <p>Order ID: {{ $orderId }}</p>
                        <!-- You can add more details about the order as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
