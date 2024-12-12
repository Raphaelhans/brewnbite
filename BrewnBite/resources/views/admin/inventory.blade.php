@extends('admin.layout')

@section('title')
    Inventory
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Inventory</h2>
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Unit</th>
                            <th>Edit</th>
                            <th>Restock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Gecko</td><td>Firefox 1.0</td><td>Win 98+ / OSX.2+</td><td><button type="submit" class="btn btn-warning w-100">Edit</button></td><td><button type="submit" class="btn btn-danger w-100">Delete</button></td></tr>
                        <tr><td>Gecko</td><td>Firefox 1.5</td><td>Win 98+ / OSX.2+</td><td>1.8</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Firefox 2.0</td><td>Win 98+ / OSX.2+</td><td>1.8</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Firefox 3.0</td><td>Win 2k+ / OSX.3+</td><td>1.9</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Camino 1.0</td><td>OSX.2+</td><td>1.8</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Camino 1.5</td><td>OSX.3+</td><td>1.8</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Netscape 7.2</td><td>Win 95+ / Mac OS 8.6-9.2</td><td>1.7</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Netscape Browser 8</td><td>Win 98SE+</td><td>1.7</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Netscape Navigator 9</td><td>Win 98+ / OSX.2+</td><td>1.8</td><td>A</td></tr>
                        <tr><td>Gecko</td><td>Mozilla 1.0</td><td>Win 95+ / OSX.1+</td><td>1</td><td>A</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection