<!-- resources/views/reservation/reserve.blade.php -->

@extends('admin.admin-layout')  {{-- Assuming you have a main layout file --}}

@section('content')
    <div class="container">
        <h2>Reserve a Table</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('reserve') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="table_id">Select a Table:</label>
                <select name="table_id" id="table_id" class="form-control">
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reservation_date_time">Reservation Date and Time:</label>
                <input type="datetime-local" name="reservation_date_time" id="reservation_date_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="number_of_guests">Number of Guests:</label>
                <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reserve Table</button>
        </form>
    </div>
@endsection
