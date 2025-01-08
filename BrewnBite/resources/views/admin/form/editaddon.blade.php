@extends('admin.layout')

@section('title')
    Edit Addon
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit Addon</h3>
        </div>
        <form action="{{ route('admin.master.addons.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $addon->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" value="{{ $addon->name }}" required>
                </div>
                <div class="form-group">
                    <label for="inputprice">Price</label>
                    <input type="number" class="form-control" id="inputprice" placeholder="Enter price" name="price" value="{{ $addon->price }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @foreach ($categories as $item)
                            @if ($addon->id_category == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.addons.addons') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection