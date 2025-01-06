@extends('admin.layout')

@section('title')
    Edit User
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <form action="{{ route('admin.master.users.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" value="{{ $user->name }}" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="Enter email" name="email" required>
                </div>
                @if ($user->role == 1)    
                    <div class="form-group">
                        <label for="inpRole">Membership</label>
                        <input type="text" class="form-control" id="inpRole" placeholder="{{ $user->membership }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="totalspent">Total Spent</label>
                        <input type="text" class="form-control" id="totalspent" placeholder="{{ $user->total_spent }}" disabled>
                    </div>
                @endif
                <div class="form-group">
                    <label for="inputProfile">Profile</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputProfile" name="profile">
                            <label class="custom-file-label" for="inputProfile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.users.users') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection