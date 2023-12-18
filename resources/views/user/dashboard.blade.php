@extends('admin.admin-layout')
@extends('user.header')
@section('title', 'User Dashboard')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container mt-4 mb-3">
    <div class="card">
        <div class="card-header text-center display-2">User Dashboard</div>
        <div class="card-body">

            <h3 class="mt-4 mb-3 text-center">Available Tables</h3>
            <ul class="list-group text-center">
                @forelse ($availableTables as $table)
                    <li class="list-group-item">
                        Table {{ $table->id }} -
                        Status: {{ $table->status === 'occupied' ? 'Occupied' : 'Available' }}
                    </li>
                @empty
                    <li class="list-group-item">No available tables at the moment.</li>
                @endforelse
            </ul>

                <h3 class="mt-4 text-center">Your Waiting Queue</h3>
                <ul class="list-group justify-content-center">
                    @if(!empty($userReservations)) <!-- Add this line to check if $userReservations is not null -->
                            @foreach ($userReservations as $reservation)
                                <div>
                                    <p>Reservation Date: {{ $reservation->reservation_date_time }}</p>
                                    <p>Number of Guests: {{ $reservation->number_of_guests }}</p>
                                    <p>Status: {{ ucfirst($reservation->status) }}</p>
                                </div>
                            @endforeach
                        @else
                        <li class="list-group-item text-center">
                            You don't have any reservations. Make a reservation to join the waiting queue.
                        </li>
                    @endif
                
                </ul>

            </div>
        </div>
    </div>

    <!-- Include the dashboard.js file -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
