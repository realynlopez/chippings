<!-- resources/views/user/dashboard.blade.php -->

@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Eskinita by Chippings</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book.table') }}">Book a Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('queue.status')}}">Queue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.menu.index')}}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.feedback.form')}}">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </div>
        </nav>

        <div class="mt-4 mb-3 text-center">
            <div class="card">
                <div class="card-header">User dashboard</div>
                    <div class="card-body">
                        <h3 class="mt-4 mb-3 text-center">Available Tables</h3>
                        <ul class="list-group justify-content-center">
                        @if($availableTables)
                            @forelse ($availableTables as $table)
                                <li class="list-group-item">Table {{ $table->id }}</li>
                            @empty
                                <li class="list-group-item">No available tables at the moment.</li>
                            @endforelse
                        @endif
                        </ul>

                        <h3 class="mt-4 text-center">Your Waiting Queue</h3>
                        <ul class="list-group justify-content-center">
                        @if($userReservations)
                            @forelse ($userReservations as $reservation)
                                <li class="list-group-item">
                                    <strong>Reservation ID:</strong> {{ $reservation->id }}<br>
                                    <strong>Table:</strong> {{ $reservation->table_id }}<br>
                                    <strong>Status:</strong> {{ $reservation->status }}<br>
                                    <!-- Add more reservation details as needed -->
                                </li>
                            @empty
                                <li class="list-group-item">
                                    You don't have any reservations. Make a reservation to join the waiting queue.
                                </li>
                            @endforelse
                        @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
@endsection
