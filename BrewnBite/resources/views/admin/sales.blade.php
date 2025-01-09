@php
    if (!function_exists('formatRupiah')) {
        function formatRupiah($number)
        {
            return 'Rp' . number_format($number, 2, ',', '.');
        }
    }
$months = [$sales[0]->month, $sales[1]->month, $sales[2]->month, $sales[3]->month, $sales[4]->month, $sales[5]->month, $sales[6]->month];
$sales = [$sales[0]->total_grandtotal, $sales[1]->total_grandtotal, $sales[2]->total_grandtotal, $sales[3]->total_grandtotal, $sales[4]->total_grandtotal, $sales[5]->total_grandtotal, $sales[6]->total_grandtotal];
@endphp
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
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">Period</th>
                            <th style="width: 20%">Sales</th>
                            <th style="width: 15%"># Items Sold</th>
                            <th style="width: 20%">Sales VS Last Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_sales as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ formatRupiah($item->total_grandtotal) }}</td>
                                <td>{{ $item->total_amount }}</td>
                                <td>
                                    @php
                                        $this_month_sales = $all_sales[$key]->total_grandtotal;
                                        $prev_month_sales = $key > 0 ? $all_sales[$key - 1]->total_grandtotal : 0;
                                        if ($prev_month_sales > 0) {
                                            $percentageChange = (($this_month_sales - $prev_month_sales) / $prev_month_sales) * 100;
                                        } else {
                                            $percentageChange = $this_month_sales > 0 ? 100 : 0;
                                        }
                                    @endphp
                                    @if ($percentageChange > 0)
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i>{{ $percentageChange }}%
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <i class="fas fa-arrow-down"></i>{{ $percentageChange }}%
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        {{-- <tr>
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
                        </tr> --}}
                    </tbody>
                </table>
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
@endsection
