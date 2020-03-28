@extends('admin.layouts.master')

@section('title','Edit Post')

@section('content')
    
<div class="container-fluid">
    <div class="col-md-12">
        <a href="{{url('admin/post')}}">
                <button class="btn btn-primary mb-3 "><div class="fas fa-arrow-left"></div>&nbsp;Back</button> 
            </a>
        </div>

  @if (session('status'))
<p class="alert  alert-success">{{session('status')}}</p>
  @endif

    <div class="row ">
      @include('admin.message.index')
        <div class="card col-md-10 offset-1">
          {{-- @include('admin.message.index') --}}
            <div class="card-header">
                <h4 class="text-primary">Edit Post </h4>
            </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                          
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="7">{{$post->description}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="image" >Image Uploads</label>
                          <input type="file" class="form-control-file btn btn-outline-secondary" name="image">
                          </div>
                          <div class="form-group">
                              <label for="link">Youtube link</label>
                          <input type="text" name="link" class="form-control btn btn-outline-secondary" value="{{$post->link}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Category</label>
                            <select name="category_id" class="form form-control">
                              
                              @foreach ($cats as $cat)
                                  
                             
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                              
                              
                              @endforeach
                            </select>
                          </div>
                        <button type="submit" class="btn btn-outline-primary mt-3">Update</button>
                      </form>
                </div>
                
        </div>
    </div>
</div>


@endsection