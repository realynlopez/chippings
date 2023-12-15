@extends('sales.layout_sales')

@section('title', 'Eskinit by Chippings | Sales Page')

@section('content')
    <div style="max-width: 600px; margin: auto;">
        <h2>Sales Page</h2>
        <canvas id="myChart" width="400" height="400"></canvas>
        <br>
        
    </div>

    <script src="{{ asset('assets/js/chart_data.js') }}"></script>
    <script>
        fetchSalesData();
    </script>
@endsection