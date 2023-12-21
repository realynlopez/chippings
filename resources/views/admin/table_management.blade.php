@extends('admin.admin-layout')
@extends('include.header')

@section('content')
    <div class="container justify-content-center">

        <h2 class="text-center mt-4 mb-3">Table Management</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.add.table') }}">
            @csrf
            <div class="form-group">
                <label for="table_name">Table Name:</label>
                <input type="text" name="table_name" id="table_name" class="form-control" required>
            </div>

            <!-- Add more fields as needed for your table configuration -->

            <button type="submit" class="btn btn-primary mt-2">Add Table</button>
        </form>

       <!-- Display the list of available tables -->
        <h3 class="mt-4">Available Tables</h3>

        @if(isset($tables) && is_countable($tables) && count($tables) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Table Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Delete</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->table_name }}</td>
                            <td>{{ ucfirst($table->status) }}</td>
                            <td>
                                @if($table->status === 'available')
                                    <form method="post" action="{{ route('admin.mark.occupied', ['id' => $table->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Mark Occupied</button>
                                    </form>
                                @else
                                    <span>Occupied</span>
                                @endif
                            </td>
                            <td>
                                <!-- Delete button column -->
                                <form method="post" action="{{ route('admin.delete.table', ['id' => $table->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tables available.</p>
        @endif

    </div>
@endsection
