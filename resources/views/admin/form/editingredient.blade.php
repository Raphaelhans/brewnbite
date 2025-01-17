@extends('admin.layout')

@section('title')
    Edit Ingredient
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit Ingredient</h3>
        </div>
        <form action="{{ route('admin.master.ingredients.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $ingredient->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" value="{{ $ingredient->name }}" required>
                </div>
                <div class="form-group">
                    <label for="inputstock">Stock</label>
                    <input type="number" class="form-control" id="inputstock" placeholder="Enter stock" name="stock" value="{{ $ingredient->stock }}" required>
                </div>
                <div class="form-group">
                    <label for="inputunit">Unit</label>
                    <input type="text" class="form-control" id="inputunit" placeholder="Enter unit" name="unit" value="{{ $ingredient->unit }}" required>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.ingredients.ingredients') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection