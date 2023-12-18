<!-- resources/views/admin/orders/index.blade.php -->

@extends('admin.admin-layout')
@section('title', 'Order Lists | Eskinita By Chippings')
@section('content')
    <div class="container">
        <h1 class="order text-center">Order List</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>User</th>
                        <!-- Add other order-related columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                        <td>{{ $order->id }}</td>
                            <td>
                                @if ($order->name)
                                    {{ $order->name }}
                                @else
                                    No User
                                @endif
                            </td>
                            <!-- Add other order-related columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
