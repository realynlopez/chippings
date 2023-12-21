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
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/logo-chippings.jpg') }}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ route('admin.admin-dashboard') }}" class="btn btn-secondary mt-3 mb-2">Back to Dashboard</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('queue')}}">Queue Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.menu.index')}}">Menu Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.table.management')}}">Table Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.admin_reservation')}}">Reservation Management</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales.index')}}">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newlyRegisteredUsers')}}">New User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.feedback.index')}}">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX2cW05u4f4cR3dw9Z4/3g4QhE5A7L1i" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4O7vcAJqSgwm6kM9h2nGvCYU" crossorigin="anonymous"></script>
</body>
</html>