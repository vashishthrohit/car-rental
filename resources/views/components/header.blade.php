<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="{{url('assets/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="{{url('assets/css/theme.css')}}"> -->

    <!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css"> -->
    <link rel="stylesheet" href="{{url('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('aasets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/aos.css')}}">

    
    <!-- <link  rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    
    <title>{{$title}}</title>
  </head>
  <body>

<!--**************************-
        Header Area
*****************************-->

<div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.html"><strong>CarRental</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-end ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                  <li><a href="{{url('ablut-us')}}" class="nav-link">About</a></li>
                  <li><a href="{{url('listing')}}" class="nav-link">Listing</a></li>
                  <!-- <li><a href="testimonials.html" class="nav-link">Testimonials</a></li> -->
                  <li><a href="{{url('blog')}}" class="nav-link">Blog</a></li>
                  <li><a href="{{url('contact')}}" class="nav-link">Contact</a></li>
                  @if (session()->has('role'))
                    <li><a href="{{url('contact')}}" class="nav-link">R</a></li>
                  @else
                    <li><a href="{{url('')}}" class="nav-link">Login</a></li>
                  @endif
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

<!-- <section  class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('assets/images/logo.png')}}"/>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-auto">
                <span><i class="fa-solid fa-phone"></i> (24 X 7) +91 9253648932</span>
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-center" aria-current="page" href="#"><i class="fa-brands fa-app-store"></i><br>Download App</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-center" href="#"><i class="fa-solid fa-briefcase"></i><br>Travel Ajent</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link text-center" href="#"><i class="fa-solid fa-user"></i><br>User</a>
              </li>        
            </ul>            
          </div>
        </div>
      </nav>
</section> -->
<!-----------------------------
        End header area
------------------------------->