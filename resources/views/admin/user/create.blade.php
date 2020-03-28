@extends('admin.layouts.master')


@section('title','Add User')


@section('content')
    
<div class="container-fluid">
    <div class="col-md-12">
        <a href="{{url('admin/user')}}">
                <button class="btn btn-primary mb-3 ml-3"><div class="fas fa-arrow-left"></div>&nbsp;Back</button> 
            </a>
        </div>
    <div class="row">
        <div class="card col-md-8 offset-2">
            @if (session('status'))
            
            <p class="alert alert-success mt-2">{{ session('status') }}</p>
           
            @endif


            <div class="card-header">
                    <h4 class="text-primary">Add User</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    @include('admin.message.index')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                        
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                        
                      </div>
                      <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role">
                      </div>
                      <div class="form-group">
                        <label for="image" >Image Uploads</label>
                        <input type="file" class="form-control-file btn btn-outline-secondary" name="image">
                      </div>
                      <button type="submit" class="btn btn-outline-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection