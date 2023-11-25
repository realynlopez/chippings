@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add New Menu Item</h1>

        <!-- Form to add a new menu item -->
        <form method="POST" action="{{ route('admin.menu.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <!-- Add other form fields as needed -->
            <button type="submit" class="btn btn-primary">Add Menu Item</button>
        </form>
    </div>
@endsection
