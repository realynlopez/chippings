<!-- resources/views/reservation/available_tables.blade.php -->

@extends('admin.admin-layout')  {{-- Assuming you have a main layout file --}}

@section('content')
    <div class="container">
        <h2>Available Tables</h2>
            @foreach ($tables as $table)
                <div>
                    <p>Table {{ $table->id }}</p>
                    <form action="{{ route('join.queue') }}" method="post">
                        @csrf
                        <input type="hidden" name="table_id" value="{{ $table->id }}">
                        <button type="submit">Join Queue</button>
                    </form>
                </div>
            @endforeach
        @if($tables->isEmpty())
            <p>No available tables at the moment.</p>
        @else
            <ul>
                @foreach ($tables as $table)
                    <li>
                        Table {{ $table->id }}
                        <form action="{{ route('reserve.table') }}" method="post">
                            @csrf
                            <input type="hidden" name="table_id" value="{{ $table->id }}">
                            <label for="reservation_date_time">Reservation Date and Time:</label>
                            <input type="datetime-local" name="reservation_date_time" required>
                            <label for="number_of_guests">Number of Guests:</label>
                            <input type="number" name="number_of_guests" required>
                            <button type="submit">Reserve Table</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
