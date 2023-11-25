<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Eskinita By Chippings')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include additional CSS files for the admin panel from the public/css folder -->
    @yield('additional_css')
    <!-- Include your custom CSS file for the admin panel -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-orders.css') }}">

</head>
<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include additional JS files for the admin panel from the public/js folder -->
    @yield('additional_js')
    <!-- Include your custom JS file for the admin panel -->
    <script src="{{ asset('assets/js/admin-index.js') }}"></script>
    <script src="{{ asset('assets/js/admin-orders.js') }}"></script>

</body>
</html>
