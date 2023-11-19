@extends('login-layout')
@section('title', 'Login')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/reg-style.css') }}" rel="stylesheet">
@endsection

@section('additional_js')
    <!-- Include additional JS files for the registration panel here -->
    <!-- For example, you can link your custom JS file -->
    <script src="{{ asset('assets/js/reg-script.js') }}"></script>
@endsection

<head>
    <!-- Other meta tags and styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('path/to/your/local/fontawesome.css') }}"> <!-- If you prefer hosting it locally -->
    <link rel="stylesheet" href="style.css"> <!-- Your custom styles -->
</head>

@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-1" style="width: 500px">
        @csrf
        <h1>Sign In</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email and password</span>
        <div class="mb-1">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="mb-1">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="col-mb-1">
            <label for="job" class="form-label">Choose User</label>
            <select class="form-select" name="job" id="job">
                <option disabled selected>Option</option>
                <option value="Admin">Admin</option>
                <option value="Cashier">Cashier</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Rider">Rider</option>
                <option value="Customer">Customer</option>
            </select>
        </div>
        <br>
        <div class="mb-1">
            <a href="#">Forget Your Password?</a>
        </div>
        <div class="mb-5">
            <button class="btn btn-primary btn-lg" type="submit">Sign In</button>
        </div>
    </form>
</div>
@endsection
