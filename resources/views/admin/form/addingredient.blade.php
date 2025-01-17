@extends('admin.layout')

@section('title')
    Add Ingredient
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-primary" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Add Ingredient</h3>
        </div>
        <form action="{{ route('admin.master.ingredients.doadd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="inputstock">Stock</label>
                    <input type="number" class="form-control" id="inputstock" placeholder="Enter stock" name="stock" required>
                </div>
                <div class="form-group">
                    <label for="inputunit">Unit</label>
                    <input type="text" class="form-control" id="inputunit" placeholder="Enter unit" name="unit" required>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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
                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection