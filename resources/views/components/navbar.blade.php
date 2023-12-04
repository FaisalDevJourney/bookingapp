<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{asset("assets/vendor/animate.css/animate.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset("assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">
</head>
<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
    
          <div class="logo">
            <h1><a href="{{URL('/')}}">Learn.IO</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="active" href="{{URL('/')}}">Home</a></li>
              <li><a href="{{URL('/courses')}}">Courses</a></li>
              {{-- <li><a href="team.html">Team</a></li> --}}
              @auth
              <li><a href="{{URL('/mycourses')}}">My Courses</a></li>
              <li><a href="{{URL('/topup')}}">wallet amount: {{Auth::user()->wallet->amount}} $</a></li>
                @if(Auth::user()->role == "instructor")
                  <li><a href="{{URL('/addcourse')}}">Add Course</a></li>
                @endif
              <li><a href="{{URL('/logout')}}">logout</a></li>
              @else
              <li><a href="{{URL('/login')}}">Login</a></li>
              <li><a href="{{URL('/register')}}">Register</a></li>
              @endauth
              
              {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li> --}}
              {{-- <li><a href="contact.html">Contact</a></li> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
      </header><!-- End Header -->
</body>
</html>