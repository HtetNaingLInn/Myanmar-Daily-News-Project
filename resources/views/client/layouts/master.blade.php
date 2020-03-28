<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="#"><i class="fab fa-mastodon "></i>&nbsp; Daily News</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            
              <li class=" nav nav-item">
              <a href="{{url('/')}}" class="nav-link">
                 <button class="btn btn-outline-info text-light"> Home</button>
                </a>
              </li>
           
            
            <li class="nav-item">
              
              <div class="dropdown nav-link">
                <button class="btn btn-outline-info text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  News
                </button>
                <div class="dropdown-menu">
                  @foreach ($cats as $cat)
                      
                 
                <a class="dropdown-item bg-light" href="{{action('CategoryController@index',$cat->id)}}"><button class="btn light text-dark" value="{{$cat->id}}">{{$cat->name}}</button></a>
                  @endforeach
                </div>
              </div>
              
            </li>
           
            <li class=" nav nav-item">
            <a href="{{url('about')}}" class="nav-link">
               <button class="btn btn-outline-info text-light">About</button>
              </a>
            </li>
            <li class=" nav nav-item">
            <a href="{{url('contact')}}" class="nav-link">
               <button class="btn btn-outline-info text-light">Contact Us</button>
              </a>
            </li>
         
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fas fa-search text-dark"></i></button>
          </form>
        </div>
      </nav>
      
      
        @yield('content')
  
</body>
<footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</html>