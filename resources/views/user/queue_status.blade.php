@extends('admin.admin-layout')
@extends('user.header')
@section('title', 'Queue Status')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container mt-4">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center fw-bold">Queue Status</div>
            <div class="card-body">
                <h3 class="mt-4 text-center">Current Queue Status</h3>
                <ul class="list-group justify-content-center">
                    @forelse ($queue as $queueItem)
                        <li class="list-group-item">
                            <strong>Queue ID:</strong> {{ $queueItem->id }}<br>
                            <strong>User ID:</strong> {{ $queueItem->customer_name }}<br>
                            <strong>Status:</strong> {{ $queueItem->status }}<br>
                            <!-- Add more queue details as needed -->
                        </li>
                    @empty
                        <li class="list-group-item">The queue is currently empty.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
