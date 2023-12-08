@extends('admin.admin-layout')

@section('content')
    <div class="container">
        <h1>Admin Feedback</h1>

        @foreach($feedbacks as $feedback)
            <div>
                <p>User: {{ $feedback->user->name ?? 'Anonymous' }}</p>
                <p>Comments: {{ $feedback->comments }}</p>
                <p>Rating: {{ $feedback->rating }}</p>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
