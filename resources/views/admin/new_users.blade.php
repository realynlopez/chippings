<!-- resources/views/admin/new_users.blade.php -->

@extends('layout')
@section('title', 'New Users')

@section('content')
    <div class="new-users">
        <h2>New Users</h2>
        <div class="user-list">
            @foreach($newUsers as $user)
                <div class="user">
                    <img src="{{ $user->profile_image }}">
                    <h2>{{ $user->name }}</h2>
                    <p>{{ $user->time_ago }}</p>
                </div>
            @endforeach
            <div class="user">
                <img src="{{ asset('assets/images/plus.png') }}">
                <h2>More</h2>
                <p>New User</p>
            </div>
        </div>
        <a href="{{ route('admin.new_users') }}">View All</a>
    </div>
@endsection
