@php
    if (!function_exists('formatRupiah')) {
        function formatRupiah($number)
        {
            return 'Rp' . number_format($number, 2, ',', '.');
        }
    }
$labels = [$topspenders[0]->name, $topspenders[1]->name, $topspenders[2]->name, $topspenders[3]->name, $topspenders[4]->name];
$data = [$topspenders[0]->total_spent, $topspenders[1]->total_spent, $topspenders[2]->total_spent, $topspenders[3]->total_spent, $topspenders[4]->total_spent];
$colors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'];
$months = [$sales[0]->month, $sales[1]->month, $sales[2]->month, $sales[3]->month, $sales[4]->month, $sales[5]->month, $sales[6]->month];
$sales = [$sales[0]->total_grandtotal, $sales[1]->total_grandtotal, $sales[2]->total_grandtotal, $sales[3]->total_grandtotal, $sales[4]->total_grandtotal, $sales[5]->total_grandtotal, $sales[6]->total_grandtotal];
@endphp
@extends('admin.layout')

@section('title')
    Dashboard
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 flex-grow-1">
        <h2 class="my-4">Welcome, admin!</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body mb-0">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Best Sellers</h3>
                                <a href="{{ route('admin.bestsellers') }}">View Report</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dtrans as $item)
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{formatRupiah($item->product->price)}}</td>
                                            <td>{{$item->total_amount}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Sales</h3>
                                <a href="{{ route('admin.sales') }}">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="width: 100%;">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">{{ formatRupiah($total_sales) }}</span>
                                    <span>Sales Over Time</span>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    @if ($percentageChange > 0)
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i>{{ $percentageChange }}%
                                        </span>
                                    @else
                                    <span class="text-danger">
                                        <i class="fas fa-arrow-down"></i>{{ $percentageChange }}%
                                    </span>
                                    @endif
                                    <span class="text-muted">Since last month</span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200" width="764"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Top Spenders</h3>
                                <a href="{{ route('admin.topspenders') }}">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Inventory</h3>
                                <a href="{{ route('admin.master.ingredients.ingredients') }}">View Report</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Stock</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ingredients as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <span class="{{ $item->stock < 100 ? 'text-danger' : ($item->stock < 1000 ? 'text-warning' : 'text-success') }}">
                                                    {{$item->stock}}
                                                </span>
                                            </td>
                                            <td>{{$item->unit}}</td>
                                            <td>
                                                <a href="{{ route('admin.restock.restock', ['id' => $item->id]) }}" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('sales-chart').getContext('2d');
            var months = <?php echo json_encode($months); ?>;
            var sales = <?php echo json_encode($sales); ?>;
            var salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                            label: 'This year',
                            backgroundColor: 'rgba(60,141,188,0.2)',
                            borderColor: '#3b8bba',
                            data: sales,
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var labels = <?php echo json_encode($labels); ?>;
            var data = <?php echo json_encode($data); ?>;
            var colors = <?php echo json_encode($colors); ?>;
    
            var ctx = document.getElementById('pieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                }
            });
        });
    </script>
@endsection