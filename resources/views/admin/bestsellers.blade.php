@php
    if (!function_exists('formatRupiah')) {
        function formatRupiah($number)
        {
            return 'Rp' . number_format($number, 2, ',', '.');
        }
    }
@endphp
@extends('admin.layout')

@section('title')
    Best Seller
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 flex-grow-1" >
        <h2 class="my-4">Best Seller</h2>
        <div class="card h-100">
            <div class="card-body mb-0">
                <div class="card-header border-0">
                    <h3 class="card-title">Top Products by Purchases</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table id="bestseller1" class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th># Items Sold</th>
                                <th>Rating</th>
                                <th>Sales</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bestsellers1 as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{formatRupiah($item->price)}}</td>
                                    <td>{{$item->total_sold}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>{{formatRupiah($item->total_revenue)}}</td>
                                    <td>
                                        <a href="{{ route('admin.production.production', ['id' => $item->id]) }}" class="text-muted">
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
@endsection

@section('js')
    <script>
        $(function () {
            $('#bestseller1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 10,
                "order": [[2, "desc"]]
            });
        });
    </script>
@endsection