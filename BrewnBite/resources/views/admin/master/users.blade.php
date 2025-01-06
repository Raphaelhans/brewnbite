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
    Master Users
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="container-fluid px-3 mt-3 bg-body-tertiary flex-grow-1">
        <h2 class="my-4">Customers</h2>
        <div class="card">
            <div class="card-body">
                <table id="tableusers" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Membership</th>
                            <th>Credit</th>
                            <th>Total Spent</th>
                            <th style="width: 10%">Created at</th>
                            <th style="width: 10%">Updated at</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr @if($item->deleted_at) style="background-color: lightgray;" @endif>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>hidden</td>
                                <td>
                                    <div class="progress-group">
                                        @if ($item->membership == 1)
                                            Bronze
                                        @elseif ($item->membership == 2)
                                            Silver
                                        @elseif ($item->membership == 3)
                                            Gold
                                        @elseif ($item->membership == 4)
                                            Diamond
                                        @endif
                                        <span class="float-right">
                                            <b>{{ formatRupiah($item->total_spent) }}</b>{{ $item->membership == 1 ? "/49k" : ($item->membership == 2 ? "/99k" : ($item->membership == 3 ? "/199k" : "")) }}
                                        </span>
                                        <div class="progress progress-sm">
                                            @php
                                                $limits = [1 => 49000, 2 => 99000, 3 => 199000, 4 => $item->total_spent];
                                                $colors = [1 => "#cd7f32", 2 => "silver", 3 => "gold", 4 => "#b9f2ff"];
                                                $limit = $limits[$item->membership] ?? 1;
                                                $color = $colors[$item->membership] ?? "#000";
                                                $width = ($item->total_spent / $limit) * 100;
                                            @endphp
                                            <div class="progress-bar" style="width: {{ $width }}%; background-color: {{ $color }};"></div>
                                        </div>                                        
                                    </div>
                                </td>
                                <td>{{formatRupiah($item->credit)}}</td>
                                <td data-order="{{ $item->total_spent }}">{{formatRupiah($item->total_spent)}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <form action="{{ route('admin.master.users.edit', ['id' => $item->id]) }}" method="get">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-warning w-100">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    @if ($item->deleted_at)
                                        <form action="{{ route('admin.master.users.activate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-success w-100">Activate</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.master.users.suspend') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-danger w-100">Suspend</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h2 class="my-4">Employees</h2>
        <div class="card">
            <div class="card-body">
                <table id="tableemployees" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th style="width: 20%">Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 20%">Password</th>
                            <th style="width: 10%">Created at</th>
                            <th style="width: 10%">Updated at</th>
                            <th style="width: 10%">Edit</th>
                            <th style="width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $item)
                            <tr @if($item->deleted_at) style="background-color: lightgray;" @endif>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>hidden</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <form action="{{ route('admin.master.users.edit', ['id' => $item->id]) }}" method="get">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-warning w-100">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    @if ($item->deleted_at)
                                        <form action="{{ route('admin.master.users.activate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-success w-100">Activate</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.master.users.suspend') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-danger w-100">Suspend</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h2 class="my-4">Admins</h2>
        <div class="card">
            <div class="card-body">
                <table id="tableadmins" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th style="width: 20%">Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 20%">Password</th>
                            <th style="width: 20%">Created at</th>
                            <th style="width: 20%">Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $item)
                            <tr @if($item->deleted_at) style="background-color: lightgray;" @endif>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>hidden</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
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
            $('#tableusers').DataTable({
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
    <script>
        $(function () {
            $('#tableemployees').DataTable({
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
    <script>
        $(function () {
            $('#tableadmins').DataTable({
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