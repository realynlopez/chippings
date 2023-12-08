@extends('admin.admin-layout')

@section('content')
    <div class="container">
        <h1>Feedback</h1>

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

            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
@endsection
