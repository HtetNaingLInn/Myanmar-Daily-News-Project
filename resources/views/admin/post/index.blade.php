@extends('admin.layouts.master')

@section('title','All Post')


@section('content')


<div class="container-fluid">
    <div class="container-fluid">
        <div class="row col-md-12">

            <div class="col-md-4">
                <a href="{{url('admin/post/create')}}"><button class="btn btn-primary mb-3"><div class="fas fa-plus-circle"></div>&nbsp;Create Post</button></a>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <form>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search By Category name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <hr>
    <div class="row col-md-12">


    @forelse ($posts as $post)
            
       <div class="container-fluid col-md-6">
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    {{Str::limit($post->description,'150') }}
                </div>
                <div class="card-footer">
                    <div class="float-right">
                    <a href="{{action('admin\PostController@detail',$post->id)}}" class="btn-sm btn-info"><div class="fas fa-eye"></div></a>
                    <a href="{{action('admin\PostController@edit',$post->id)}}" class="btn-sm btn-success"><div class="fas fa-edit"></div></a>
                    <a href="{{action('admin\PostController@destroy',$post->id)}}" class="btn-sm btn-danger"><div class="fas fa-trash"></div></a>
                    </div>
                </div>
            </div>
        </div>
     </div>
     @empty
     <h3 class="text text-danger">There is no post </h3>
         
     
    @endforelse
    <div class="col-md-12  pagination justify-content-center">
        {{ $posts->links() }}
    </div>
    </div>
</div>
    
@endsection