@extends('admin.layout')

@section('title')
    Add Promo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-primary" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Add Promo</h3>
        </div>
        <form action="{{ route('admin.master.promos.doadd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="inputdisc">Discount</label>
                    <input type="number" class="form-control" id="inputdisc" placeholder="Enter discount (%)" name="discount" required>
                </div>
                <div class="form-group">
                    <label for="inputmin">Minimal Transaction</label>
                    <input type="number" class="form-control" id="inputmin" placeholder="Enter minimal transaction" name="min_transaction" required>
                </div>
                <div class="form-group">
                    <label for="inputmax">Max Discount</label>
                    <input type="number" class="form-control" id="inputmax" placeholder="Enter maximal discount" name="max_discount" required>
                </div>
                <div class="form-group">
                    <label for="requirement">Requirement</label>
                    <select class="form-control" id="requirement" name="requirement" required>
                        <option value="1">Bronze</option>
                        <option value="2">Silver</option>
                        <option value="3">Gold</option>
                        <option value="4">Diamond</option>
                    </select>
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