@extends('layout')
@section('title', 'Eskinita by Chippings | Home Page')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/homepage.css') }}" rel="stylesheet">
@endsection

@section('content')
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="#">Eskinita by Chippings</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<!-- Slider Section -->
<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Add your slider items here -->
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/chippings-cover-main.jpg') }}" class="d-block w-100" alt="Slider Image 1">
            <div class="carousel-caption d-none d-md-block">
                <a href="#home" class="btn btn-outline-dark btn-lg btn-transparent">Home</a>
            </div>
        </div>        
        <div class="carousel-item">
        <img src="{{ asset('assets/images/chippings-cover.jpg') }}" class="d-block w-100" alt="Slider Image 2">
            <div class="carousel-caption d-none d-md-block">
            <a href="#about" class="btn btn-outline-dark btn-lg btn-transparent">about</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/chippings-wbg.jpg') }}" class="d-block w-100" alt="Slider Image 3">
            <div class="carousel-caption d-none d-md-block">
            <a href="#about" class="btn btn-outline-dark btn-lg btn-transparent">about</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- About Section -->
<section id="about" class="mt-5 about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Home content here -->
            </div>
            <div class="col-md-6">
                <!-- About content here -->
                <h2>About Us</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vivamus ut massa nec augue bibendum laoreet.
                    Integer dignissim lectus id libero mollis, id auctor tortor iaculis.
                    Quisque mollis elit vitae enim lobortis, a interdum turpis lobortis.
                </p>
                <p>
                    Vestibulum eu elit sed erat tempus vestibulum.
                    Cras convallis dolor vitae mi commodo, eget ornare metus feugiat.
                    Nulla facilisi. Duis vitae arcu non est ornare bibendum.
                    Pellentesque a augue vitae erat malesuada bibendum.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Add Bootstrap JS and jQuery (required for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

@endsection
