// chart_data.js

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = null;

function fetchSalesData() {
    fetch('/chart/data', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (myChart) {
                myChart.data.labels = data.labels;
                myChart.data.datasets[0].data = data.amounts;
                myChart.update();
            } else {
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Amount', 
                            data: data.amounts,
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
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

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
            fetchSalesData();
        }
    })
    .catch(error => console.error('Error:', error));
}