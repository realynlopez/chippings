// chart-data.js

var dailySales = [];
var monthlySales = [];
var yearlySales = [];

// Check if dailySales data is available
if ('{!! json_encode($dailySales) !!}' !== '') {
    dailySales = {!! json_encode($dailySales) !!};
}

// Check if monthlySales data is available
if ('{!! json_encode($monthlySales) !!}' !== '') {
    monthlySales = {!! json_encode($monthlySales) !!};
}

// Check if yearlySales data is available
if ('{!! json_encode($yearlySales) !!}' !== '') {
    yearlySales = {!! json_encode($yearlySales) !!};
}

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [
            {
                label: 'Daily Sales',
                data: dailySales,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
            },
            {
                label: 'Monthly Sales',
                data: monthlySales,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
            },
            {
                label: 'Yearly Sales',
                data: yearlySales,
                borderColor: 'rgba(255, 205, 86, 1)',
                backgroundColor: 'rgba(255, 205, 86, 0.2)',
            },
        ]
    },
    options: {
        scales: {
            y: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    }

    window.Laravel = {
        echo: function (payload) {
            if (payload.dailySales !== undefined) {
                dailySales = payload.dailySales;
            }
    
            if (payload.monthlySales !== undefined) {
                monthlySales = payload.monthlySales;
            }
    
            if (payload.yearlySales !== undefined) {
                yearlySales = payload.yearlySales;
            }
        }
    };
});
