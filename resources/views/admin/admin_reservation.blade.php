<!-- admin.reservation_management.blade.php -->

@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Reservation Management</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Pending Reservations</div>
            <div class="card-body">
                @if(count($pendingReservations) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Reservation Date</th>
                                <th>Number of Guests</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendingReservations as $reservation)
                            <tr>
                                <td>{{ $reservation->user_id }}</td>
                                <td>{{ $reservation->reservation_date_time }}</td>
                                <td>{{ $reservation->number_of_guests }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.accept.reservation', ['id' => $reservation->id]) }}">
                                     @csrf
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>
                                    <form method="post" action="{{ route('admin.decline.reservation', ['id' => $reservation->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">Decline</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No pending reservations.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
