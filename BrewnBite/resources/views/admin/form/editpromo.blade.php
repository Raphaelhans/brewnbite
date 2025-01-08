@extends('admin.layout')

@section('title')
    Edit Promo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit Promo</h3>
        </div>
        <form action="{{ route('admin.master.promos.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $promo->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" value="{{ $promo->name }}" required>
                </div>
                <div class="form-group">
                    <label for="inputdisc">Discount</label>
                    <input type="number" class="form-control" id="inputdisc" placeholder="Enter discount (%)" name="discount" value="{{ $promo->discount }}" required>
                </div>
                <div class="form-group">
                    <label for="inputmin">Minimal Transaction</label>
                    <input type="number" class="form-control" id="inputmin" placeholder="Enter minimal transaction" name="min_transaction" value="{{ $promo->min_transaction }}" required>
                </div>
                <div class="form-group">
                    <label for="inputmax">Max Discount</label>
                    <input type="number" class="form-control" id="inputmax" placeholder="Enter maximal discount" name="max_discount" value="{{ $promo->max_discount }}" required>
                </div>
                <div class="form-group">
                    <label for="requirement">Requirement</label>
                    <select class="form-control" id="requirement" name="requirement" required>
                        <option value="1">Bronze</option>
                        <option value="2">Silver</option>
                        <option value="3">Gold</option>
                        <option value="4">Diamond</option>
                        @if ($promo->requirement == 1)
                            <option value="1" selected>Bronze</option>
                            <option value="2">Silver</option>
                            <option value="3">Gold</option>
                            <option value="4">Diamond</option>
                        @else
                            @if ($promo->requirement == 2)
                                <option value="1">Bronze</option>
                                <option value="2" selected>Silver</option>
                                <option value="3">Gold</option>
                                <option value="4">Diamond</option>
                            @else
                                @if ($promo->requirement == 3)
                                    <option value="1">Bronze</option>
                                    <option value="2">Silver</option>
                                    <option value="3" selected>Gold</option>
                                    <option value="4">Diamond</option>
                                @else
                                    <option value="1">Bronze</option>
                                    <option value="2">Silver</option>
                                    <option value="3">Gold</option>
                                    <option value="4" selected>Diamond</option>
                                @endif
                            @endif
                        @endif
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.promos.promos') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection