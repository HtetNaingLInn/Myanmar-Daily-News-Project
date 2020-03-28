@extends('client.layouts.master')

@section('title','Home')
@section('content')
<div class="container-fluid col-md-12 mt-5">

  <h1 class="text-light">AAAAAAAAAAA</h1>
</div>
<main role="main">
  
    <div class="jumbotron">
        <div class="container-fluid">
        
          <h3 class="display-4">Hello Myanmar</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, corrupti quibusdam. Rem atque, earum, doloribus odit voluptatibus, nostrum aspernatur nulla excepturi harum molestias deleniti eaque blanditiis reiciendis placeat voluptatem delectus?</p>
          <p><a class="btn btn-primary btn-ls" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>
    
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container">
<hr>
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12 text-center">
          <a href="{{url('/')}}"><button class="btn btn-outline-info mr-3">All</button></a>
          @foreach ($cats as $cat)
              
       
        <a href="{{action('CategoryController@index',$cat->id)}}"><button class="btn btn-outline-info mr-3" value="{{ $cat->id }}">{{$cat->name}}</button></a>
         @endforeach
        </div>
      </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <hr>

    <!-- START THE FEATURETTES -->
    @forelse ($posts as $post)
        
    
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7 order">
      <h2 class="featurette-heading">{{$post->title}}</h2>
      <p class="lead">{{Str::limit($post->description,'250')}}</p>
        <button class="btn btn-primary">View Details</button>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
        
      </div>
    </div>

    <hr class="featurette-divider">

    @empty

    <h2 class="text-center text-danger">No Post For You search</h2>
    @endforelse
    <div class="col-md-12 pagination justify-content-center">
      {{ $posts->links() }}
    </div>

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
  

</main>
    

@endsection