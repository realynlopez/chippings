@extends('sales.layout_sales')
@section('title', 'Sales')
@section('additional_css')
    <!-- Include additional CSS files for the sales panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/sales.css') }}" rel="stylesheet">
@endsection

@section('additional_js')
    <!-- Include additional JavaScript files for the sales panel here -->
    <!-- For example, you can link your custom JavaScript file -->
    <script src="{{ asset('js/sales.js') }}"></script>
@endsection

@section('content')
    <!-- Your sales page content goes here -->
    <div class="container">
        <h1>Sales Panel</h1>
        <canvas id="myChart"></canvas>
    </div>
@endsection