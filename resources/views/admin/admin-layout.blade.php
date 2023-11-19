<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include additional CSS files for the admin panel from the public/css folder -->
    @yield('additional_css')
    <!-- Include your custom CSS file for the admin panel -->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <!-- Add your navigation links, user profile, etc. here -->
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include additional JS files for the admin panel from the public/js folder -->
    @yield('additional_js')
    <!-- Include your custom JS file for the admin panel -->
    <script src="{{ asset('js/admin-script.js') }}"></script>
</body>
</html>
