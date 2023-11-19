<!DOCTYPE html>
<html>
  <head>
    <title>Eskinita</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Global Styles */
    body {
      background-color: #EDC8A6;
      background-attachment: fixed;
      background-repeat: no-repeat;
      font-family: 'Vibur', cursive;
      font-family: 'Abel', sans-serif;
      opacity: .95;
      height: 500px;
      top: 5%;
    }
    .navbar-expand-lg.bg-body-tertiary {
      color: #fff;
      font-size: 24px;
      margin-bottom: 20px;
      font-family: 'Segoe UI Semibold';
      background-color:#87201A;
    }

    </style>
  </head>
</html>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid mx-auto text-center" style="display: flex; justify-content: center;">
    <a class="navbar-brand" href="#">Eskinita by Chippings</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('menu') }}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('book-a-table') }}">Book a table</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('registration') }}">Registration</a>
        </li>  
        @endauth
      </ul>

      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </div>
  </div>
</nav>
