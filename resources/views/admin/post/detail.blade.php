@extends('admin.layouts.master')


@section('title',$post->title)


@section('content')

   <div class="container mt-3">
      
       
       <a href="{{url('/admin/post')}}"> <button class="btn btn-outline-info my-2"> <div class="fas fa-arrow-left"></div> Back</button></a>
       
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
           <p class="text-justify mt-3">{{$post->description}}</p>

           {{-- Comment Box is here  --}}
           <iframe width="700" height="408" 
            src="{{$post->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>  
           </div>
       </div>
   </div>
   <hr>
   
@endsection