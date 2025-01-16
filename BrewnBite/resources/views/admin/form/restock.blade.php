@extends('admin.layout')

@section('title')
    Restock
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-primary" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Restock</h3>
        </div>
        <form action="{{ route('admin.restock.update') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $item->id }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" disabled value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="inputname">Current Stock</label>
                    <input type="text" class="form-control" id="" placeholder="" name="current" disabled value="{{ $item->stock }}">
                </div>
                <div class="form-group">
                    <label for="inputquantity">Quantity</label>
                    <input type="number" class="form-control" id="inputquantity" placeholder="Enter qty" name="qty" required>
                </div>
                <div class="form-group">
                    <label for="price">Price per item</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" required>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Produce</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection