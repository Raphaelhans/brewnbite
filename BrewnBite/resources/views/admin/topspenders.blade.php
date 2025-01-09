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
@endphp
@extends('admin.layout')

@section('title')
    Top Spender
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Top Spender</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <div class="card-header">
                            <h3 class="card-title">Top Spenders</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Total Spent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alltopspenders as $item)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->total_spent }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div> --}}
                <div class="card h-100">
                    <div class="card-body mb-0">
                        <div class="card-body table-responsive p-0">
                            <table id="topspender" class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Total Spent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alltopspenders as $item)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->total_spent }}</td>
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
    $(function () {
        $('#topspender').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            'order': [[1, 'desc']],
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
