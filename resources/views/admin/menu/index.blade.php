<!-- resources/views/admin/menu/index.blade.php -->

@extends('admin.admin-layout')

@section('title', 'Menu Management')

@section('content')
    <h1>Menu Management</h1>

    <!-- Buttons for Creating and Adding Menu Items -->
    <div class="mb-3">
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Create</a>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-success">Add</a>
    </div>

    <!-- Display Menu Items Table -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
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
                <td>
                    <!-- Button for Editing Menu Item -->
                    <a href="{{ route('admin.menu.edit', $menuItem->id) }}" class="btn btn-warning">Edit</a>
                    
                    <!-- Link to Show Menu Item -->
                    <a href="{{ route('admin.menu.show', ['id' => $menuItem->id]) }}" class="btn btn-info">Show</a>
                </td>
                <!-- Add other columns as needed -->
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add other menu management functionalities as needed -->

@endsection
