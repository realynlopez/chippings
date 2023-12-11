@extends('reg-layout')
@section('title', 'Registration')
@section('additional_css')
    <link href="{{ asset('assets/css/reg-style.css') }}" rel="stylesheet">
@endsection

@section('additional_js')
    <script src="{{ asset('assets/js/reg-script.js') }}"></script>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="reg-style.css">
</head>

<body>

<div class="container text-center mx-auto">
    <div class="mt-5 mb-1">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-sm">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger alert-sm">{{ session('error') }}</div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-sm">{{ session('success') }}</div>
        @endif
    </div>

    <!-- Laravel Blade Form -->
    <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-1" style="width: 100%">
        @csrf
        <h1>Create Account</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registration</span>
        <div class="mb-1">
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="mb-1">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="mb-1">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="mb-1">
            <label for="role_id" class="form-label">Choose User</label>
            <select class="form-select" name="role_id" id="role_id">
                <option disabled selected>Choose a role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Login link -->
         <span>Already have an account? <a href="{{ route('login') }}">Sign in</a></span>
        <div class="mb-5">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and other scripts if needed -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>

@endsection
