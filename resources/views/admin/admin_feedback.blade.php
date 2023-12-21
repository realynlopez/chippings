@extends('admin.admin-layout')
@extends('include.header')
@section('content')
<div class="container mt-4 mb-3 justify-content-center">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mt-4 mb-3">Admin Feedback</h1>

                @foreach($feedbacks as $feedback)
                    <div>
                        <p>User: {{ $feedback->user->name ?? 'Anonymous' }}</p>
                        <p>Comments: {{ $feedback->comments }}</p>
                        <p>Rating: {{ $feedback->rating }}</p>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
