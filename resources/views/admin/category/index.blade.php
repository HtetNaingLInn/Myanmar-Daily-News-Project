@extends('admin.layouts.master')

@section('title','All Category')

@section('content')
    <div class="container-fluid">

      @if (session('status'))
          <p class="alert alert-danger">{{ session('status') }}</p>
      @endif
       <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <a href="{{url('admin/category/create')}}">
              <button class="btn btn-primary mb-3"><div class="fas fa-plus-circle"></div>&nbsp;Create Category </button> 
          </a>
          </div>
          <div class="col-md-8">
            <div class="col-md-12">
              <form>
                  <div class="input-group mb-3">
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

       


        



         {{-- Start card --}}
            <div class="card col-md-12">
                {{-- Start card header --}}
                    <div class="card-header">
                        <h3 class="card-title">Category List</h3>
                    </div>
              <!-- End card-header -->

              {{-- Start Card--Body --}}
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>Description</th>
                      <th colspan="2">edit</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   
                        
                    @forelse ($cats as $cat)
                    <tr>
                        <td>{{  $cat->id  }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                    <td><a href="{{action('admin\CategoryController@edit',$cat->id)}}" class="btn-sm btn-outline-info"><div class="fas fa-edit"></div></a></td>
                    <td ><a href="{{action('admin\CategoryController@destroy',$cat->id)}}" class="btn-sm btn-outline-danger"><div class="fas fa-trash"></div></a></td>
                    </tr>
                    @empty
                    <h3 class="text-danger">There is no category</h3>
                  @endforelse

                  </tbody>
                 
                    
                </table>
              </div>
              {{-- End Card Body --}}
              
            </div>
            <!-- /.card -->
          
    </div>
@endsection




