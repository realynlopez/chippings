<!-- resources/views/reservation/book_table.blade.php -->

@extends('admin.admin-layout')
@extends('user.header')
@section('title', 'Book a Table')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container mt-4 mb-3 justify-content-center">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mt-4 mb-3">Book a Tableee</h2>
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
                                <option value="{{ $table->id }}">{{ $table->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Book Table</button>
                </form>
            </div>
        </div>
    </div>

@endsection
