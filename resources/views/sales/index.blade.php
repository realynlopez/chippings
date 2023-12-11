<!-- resources/views/sales/index.blade.php -->

@extends('sales.layout_sales')

@section('title', 'Eskinit by Chippings | Sales Page')
@section('additional_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/sales.js') }}"></script>t>   
@endsection
@section('content')
<body>
    <div style="max-width: 600px; margin: auto;">
        <h2>Sales Page</h2>
        <canvas id="myChart" width="400" height="400"></canvas>
        <br>
        <label for="amount">Enter Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button onclick="updateChart()">Update Chart</button>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Sales',
                    data: [],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function updateChart() {
            var amount = document.getElementById('amount').value;

            fetch('/chart/data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ amount: amount }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update chart data
                    myChart.data.labels.push('Sale');
                    myChart.data.datasets[0].data.push(amount);
                    myChart.update();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
@endsection
