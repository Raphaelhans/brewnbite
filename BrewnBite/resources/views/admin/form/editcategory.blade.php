@extends('admin.layout')

@section('title')
    Edit Category
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <form action="{{ route('admin.master.categories.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <label for="inputdesc">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Description" id="inputdesc" name="description">{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.categories.categories') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection