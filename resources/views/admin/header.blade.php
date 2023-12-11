<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    @section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/admin_header.css') }}" rel="stylesheet">
    @endsection
</head>
<body>
<body>
<div class="navbar">
    <div class="container d-flex justify-content-center">
    <!--navbar-->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.menu.index') }}">Menu</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Transactions</a>
                <ul class="dropdown-menu">
                    <li><hr class="dropdown" href="#">Branches</li>
                    <li><a class="dropdown-item" href="{{ route('laludBranch') }}">Lalud</a></li>
                    <li><a class="dropdown-item" href="{{ route('NacocoBranch') }}">Nacoco</a></li>
            
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('queue') }}">Queue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.table.management') }}">Table management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX2cW05u4f4cR3dw9Z4/3g4QhE5A7L1i" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4O7vcAJqSgwm6kM9h2nGvCYU" crossorigin="anonymous"></script>
</body>
</html>