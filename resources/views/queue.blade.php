@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <h1>Queue Management</h1>

        <!-- Display Queue Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($queue as $index => $customer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form to add a customer to the queue -->
        <form method="POST" action="{{ route('queue.addToQueue') }}" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name:</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add to Queue</button>
        </form>

        <!-- Button to serve the next customer -->
        <form method="POST" action="{{ route('queue.serveNextCustomer') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">Serve Next Customer</button>
        </form>
    </div>
@endsection
