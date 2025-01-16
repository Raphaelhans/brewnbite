@extends('admin.layout')

@section('title')
    Sales
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Sales</h2>

        <div class="card h-100">
            <div class="card-body pb-0">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Sales</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between" style="width: 100%;">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">$18,230.00</span>
                            <span>Sales Over Time</span>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                            </span>
                            <span class="text-muted">Since last month</span>
                        </p>
                    </div>
                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200" width="764"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">Period</th>
                            <th style="width: 20%">Sales</th>
                            <th style="width: 15%"># Items Sold</th>
                            <th style="width: 20%">Profit</th>
                            <th style="width: 10%">Profit Margin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>November 2024</td>
                            <td>$100.000</td>
                            <td>4000</td>
                            <td>$80.000</td>
                            <td style="display: flex; justify-content: center;"><span class="badge bg-success h-100">80%</span></td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>November 2024</td>
                            <td>$100.000</td>
                            <td>4000</td>
                            <td>$80.000</td>
                            <td style="display: flex; justify-content: center;"><span class="badge bg-success h-100">80%</span></td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>November 2024</td>
                            <td>$100.000</td>
                            <td>4000</td>
                            <td>$80.000</td>
                            <td style="display: flex; justify-content: center;"><span class="badge bg-success h-100">80%</span></td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>November 2024</td>
                            <td>$100.000</td>
                            <td>4000</td>
                            <td>$80.000</td>
                            <td style="display: flex; justify-content: center;"><span class="badge bg-success h-100">80%</span></td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>November 2024</td>
                            <td>$100.000</td>
                            <td>4000</td>
                            <td>$80.000</td>
                            <td style="display: flex; justify-content: center;"><span class="badge bg-success h-100">80%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('pieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Category 1', 'Category 2', 'Category 3'],
                    datasets: [{
                        data: [30, 50, 20],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('sales-chart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                            label: 'This year',
                            backgroundColor: 'rgba(60,141,188,0.2)',
                            borderColor: '#3b8bba',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            fill: true,
                        },
                        {
                            label: 'Last year',
                            backgroundColor: 'rgba(210,214,222,0.2)',
                            borderColor: '#c1c7d1',
                            data: [28, 48, 40, 19, 86, 27, 90],
                            fill: true,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false,
                            },
                        },
                        y: {
                            grid: {
                                display: true,
                            },
                            ticks: {
                                beginAtZero: true,
                            },
                        },
                    },
                },
            });
        });
    </script>
@endsection
