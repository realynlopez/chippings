@extends('admin.admin-layout')

@section('content')
    <div class="container justify-content-center">
    <a href="{{ route('admin.admin-dashboard') }}" class="btn btn-secondary mt-3 mb-2">Back to Dashboard</a>

        <h1 class="text-center mt-4 mb-3">Queue Management</h1>

        <!-- Display Flash Messages with Bootstrap Styling -->
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

        <!-- Display Queue Table with Bootstrap Styling -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($queue as $index => $customer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->status }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        <!-- Form to add a customer to the queue -->
        <form method="POST" action="{{ route('add.to.queue') }}" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name:</label>
                <input type="text" class="form-control" name="customer_name" required>
                @error('customer_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add to Queue</button>
        </form>

        <!-- Button to serve the next customer with Confirmation Dialog -->
        <form method="POST" action="{{ route('queue.serveNextCustomer') }}" class="mt-3" onsubmit="return confirm('Are you sure you want to serve the next customer?');">
            @csrf
            <button type="submit" class="btn btn-success">Serve Next Customer</button>
        </form>
    </div>
@endsection
