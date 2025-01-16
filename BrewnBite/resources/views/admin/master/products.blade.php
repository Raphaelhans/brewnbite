@extends('admin.layout')

@section('title')
    Master Products
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Products</h2>
        <div class="card">
            <div class="card-body">
                <table id="tableproducts" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Weather</th>
                            <th>Image</th>
                            <th style="width: 10%">Created at</th>
                            <th style="width: 10%">Updated at</th>
                            <th style="width: 10%">Deleted at</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr @if($item->deleted_at) style="background-color: lightgray;" @endif>
                                <td>{{$item->name}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->subcategory->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{$item->rating}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->weather}}</td>
                                <td><img src="{{$item->img_url}}" alt="" style="width: 100px; height: 56.25;"></td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$item->deleted_at}}</td>
                                <td>
                                    <form action="{{ route('admin.master.products.edit', ['id' => $item->id]) }}" method="get">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-warning w-100">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    @if ($item->deleted_at)
                                        <form action="{{ route('admin.master.products.activate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-success w-100">Activate</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.master.products.deactivate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-danger w-100">Deactivate</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#tableproducts').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 10,
            });
        });
    </script>
@endsection