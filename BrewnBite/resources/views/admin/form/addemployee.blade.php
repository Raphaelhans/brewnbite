@extends('admin.layout')

@section('title')
    Add Employee
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-primary" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Add Employee</h3>
        </div>
        <form action="{{ route('admin.master.users.doadd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="inputemail">Email address</label>
                    <input type="email" class="form-control" id="inputemail" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="inputpass">Password</label>
                    <input type="password" class="form-control" id="inputpass" placeholder="Enter Password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="inputconfirm">Confirm Password</label>
                    <input type="password" class="form-control" id="inputconfirm" placeholder="Confirm Password" name="confirm" required>
                </div>
                <div class="form-group">
                    <label for="inputProfile">Profile</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputProfile" name="profile">
                            <label class="custom-file-label" for="inputProfile">Choose file</label>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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