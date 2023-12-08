<!-- resources/views/reservation/book_table.blade.php -->

@extends('admin.admin-layout')

@section('content')
    <div class="container justify-content-center">
        <h2 class="text-center mt-4 mb-3">Book a Table</h2>

        <form method="post" action="{{ route('reserve.table') }}">
            @csrf

            <div class="form-group">
                <label for="reservation_date_time">Date and Time:</label>
                <input type="datetime-local" name="reservation_date_time" id="reservation_date_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="number_of_guests">Number of Guests:</label>
                <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" required>
            </div>

            <!-- "Select Table" dropdown -->
            <div class="form-group">
                <label for="table_id">Select Table:</label>
                <select name="table_id" id="table_id" class="form-control" required>
                    @foreach ($availableTables as $table)
                        <option value="{{ $table->id }}">{{ $table->name }}</option>
                    @endforeach
                </select>



            <button type="submit" class="btn btn-primary">Book Table</button>
        </form>
    </div>
@endsection
