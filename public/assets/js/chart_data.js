// chart_data.js

// This function will be called when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Get the chart canvas and context
    var ctx = document.getElementById('myChart').getContext('2d');

    // Initialize the chart with empty data
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

    // Function to update the chart with new data
    window.updateChart = function () {
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
    };
});
