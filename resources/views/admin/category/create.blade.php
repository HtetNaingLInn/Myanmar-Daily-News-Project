@extends('admin.layouts.master')


@section('title','Add Category')


@section('content')
    
<div class="container-fluid">
    <div class="col-md-12">
        <a href="{{url('admin/category')}}">
                <button class="btn btn-primary mb-3 ml-3"><div class="fas fa-arrow-left"></div>&nbsp;Back</button> 
            </a>
        </div>
    <div class="row">
        <div class="card col-md-8 offset-2">
            @if (session('status'))
            
            <p class="alert alert-success mt-2">{{ session('status') }}</p>
           
            @endif


            <div class="card-header">
                    <h4 class="text-primary">Create Category</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    @include('admin.message.index')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-outline-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection