@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Menu Item</h1>

        <!-- Form to edit the menu item -->
        <form method="POST" action="{{ route('admin.menu.update', $menuItem->id) }}">
            @csrf
            @method('PUT') <!-- Add this line to specify the HTTP method for updating -->

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $menuItem->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" name="price" value="{{ $menuItem->price }}" required>
                
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Update Menu Item</button>
        </form>
    </div>
@endsection
