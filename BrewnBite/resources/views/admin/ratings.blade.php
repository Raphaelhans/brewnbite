@extends('admin.layout')

@section('title')
    Ratings
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Ratings</h2>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $item)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->rating }}</td>
                                <td>{{ $item->product->name }}</td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="5">
                                    <p style="display: none;">
                                        {{ $item->comment }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('js')
@endsection
