<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Transactions')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/branch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin_header.css') }}">


</head>

<body>
    @yield('branch')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>