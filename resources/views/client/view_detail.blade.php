@extends('client.layouts.master')


@section('title',$post->title)


@section('content')
<h1>AAAAAAAAAAAAAa</h1>
   <div class="container mt-3">
       <hr>
       <div class="col-md-12">
       <a href="{{url('/')}}"> <button class="btn btn-outline-info my-2"> <div class="fas fa-arrow-left"></div> Back</button></a>
       </div>
       <hr>
       <div class="row">
           <div class="col-md-4">
           <img src="{{asset('/upload/'.$post->img)}}" class="img img-thumbnail bg-dark w-100" alt="">
           </div>
           <div class="col-md-8">
               <div class="container">
                   <div class="row">
                <h3>   {{ $post->title }}</h3>
                
            </div>
                {{--  --}}
               </div>
            <h3 class="text-info my-3">About</h3>
           <p class="text-center mt-3">{{$post->description}}</p>

           {{-- Comment Box is here  --}}
           <hr>
           <div class="col-md-12">
               @if (Auth::check())
                @foreach ($comments as $comment)
                
                    <p class="alert alert-secondary">{{$comment->content}}</p>
                  
                @endforeach
               
                   
              
           <form action="{{url('comment/create')}}" method="POST">
                @csrf
                <input type="hidden" name="commendable_id" value="{{$post->id}}">
                <input type="hidden" name="commendable_type" value="App\Post">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">    
                <input type="text" class="form-control" placeholder="comment here" name="content">
                <button class="btn btn-primary mt-2 float-right" type="submit">Comment</button>
             </form>
             @endif
           </div>
           <iframe width="725" height="408" 
            src="{{$post->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>  
           </div>
       </div>
   </div>
   <hr>
   
@endsection