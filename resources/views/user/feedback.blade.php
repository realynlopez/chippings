<!-- resources/views/user/feedback.blade.php -->

@extends('admin.admin-layout')
@extends('user.header')
@section('title', 'User Feedback')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/user_header.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-4 mb-3 justify-content-center">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mt-4 mb-3">Feedback</h1>

                <!-- Check if there is a feedback flash message -->
                @if(session('feedback_submitted'))
                    <div class="alert alert-success">
                        {{ session('feedback_submitted') }}
                    </div>
                @endif

                <form action="{{ route('submit.feedback') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="comments">Comments:</label>
                        <textarea name="comments" id="comments" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <input type="number" name="rating" id="rating" min="1" max="5" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
@endsection
