@extends('admin.layouts.master')

@section('title','All Users')

@section('content')
    <div class="container-fluid">

      @if (session('status'))
          <p class="alert alert-success">{{ session('status') }}</p>
      @endif
       <div class="container-fluid">
        <div class="col-md-12">
          <a href="{{url('admin/user/create')}}">
            <button class="btn btn-primary mb-3"><div class="fas fa-plus-circle"></div>&nbsp;Create Super User </button> 
        </a>
        </div>
        

       </div>


        



         {{-- Start card --}}
            <div class="card col-md-12">
                {{-- Start card header --}}
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>
                    </div>
              <!-- End card-header -->

              {{-- Start Card--Body --}}
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>role</th>
                      <th colspan="2">edit</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   
                        
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                    <td><a href="{{action('admin\UserController@edit',$user->id)}}" class="btn-sm btn-outline-info"><div class="fas fa-edit"></div></a></td>
                    
                    </tr>

                  @endforeach

                  </tbody>
                 
                    
                </table>
              </div>
              {{-- End Card Body --}}
              
            </div>
            <!-- /.card -->
          
    </div>
@endsection




