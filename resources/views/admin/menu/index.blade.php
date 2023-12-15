<!-- resources/views/admin/menu/index.blade.php -->

@extends('admin.admin-layout')

@section('title', 'Menu Management')
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.js"></script>

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.4/socket.io.js"></script>
    <script>
        const socket = io('http://127.0.0.1:8000/'); // Change this to your Laravel app URL

        socket.on('admin-channel:App\\Events\\ItemAddedToCart', function(data) {
            console.log('Item added to cart:', data);
            // You can update the admin view here to show the new item added to the cart
            // Example: Update a table or display a notification
        });
    </script>

    <div class="container mt-4">
        <a href="{{ route('admin.admin-dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>
        <h1 style="text-align: center;">Menu Management</h1>

        <!-- Buttons for Creating and Adding Menu Items -->
        <div class="mb-3">
            <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Create</a>
        </div>

        <!-- Display Menu Items Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->id }}</td>
                        <td>{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->price }}</td>
                        <td>{{ $menuItem->description }}</td>
                        <td>
                            <!-- Display the image if available -->
                            @if($menuItem->image)
                                <img src="{{ asset('storage/' . $menuItem->image) }}" alt="Product Image" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <!-- Button for Editing Menu Item -->
                            <a href="{{ route('admin.menu.edit', $menuItem->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Button for Deleting Menu Item -->
                            <form action="{{ route('admin.menu.destroy', $menuItem->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection