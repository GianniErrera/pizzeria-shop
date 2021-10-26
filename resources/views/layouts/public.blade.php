<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        .number {
            width: 3em;
        }
    </style>


    @livewireStyles

    <link rel="stylesheet" href={{asset("css/open-iconic-bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/animate.css")}}>

    <link rel="stylesheet" href={{asset("css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{asset("css/magnific-popup.css")}}>

    <link rel="stylesheet" href={{asset("css/aos.css")}}>

    <link rel="stylesheet" href={{asset("css/ionicons.min.css")}}>

    <link rel="stylesheet" href={{asset("css/bootstrap-datepicker.css")}}>
    <link rel="stylesheet" href={{asset("css/jquery.timepicker.css")}}>


    <link rel="stylesheet" href={{asset("css/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("css/icomoon.css")}}>
    <link rel="stylesheet" href={{asset("css/style.css")}}>
  </head>

  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{ request()->is('home') ? 'active' : '' }}"><a href="index" class="nav-link">Home</a></li>
	          <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}"><a href="menu" class="nav-link">Menu</a></li>
	          <li class="nav-item {{ request()->is('services') ? 'active' : '' }}"><a href="services" class="nav-link">Services</a></li>
	          <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}"><a href="blog" class="nav-link">Blog</a></li>
	          <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="about" class="nav-link">About</a></li>
	          <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="contact" class="nav-link">Contact</a></li>
              <li class="nav-item {{ session('order_id') ? "active" : "" }} "><a href="{{route('customers-view')."#cart"}}" class="nav-link">Cart</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

<!--Content ---------------------------------------------------------------------------------------------------------->

    @yield('content')

<!--Content ---------------------------------------------------------------------------------------------------------->


    <!--Footer -->
    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>


  @livewireScripts

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/js/scripts/jquery.min.js"></script>
  <script src="/js/scripts/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/scripts/popper.min.js"></script>
  <script src="/js/scripts/bootstrap.min.js"></script>
  <script src="/js/scripts/jquery.easing.1.3.js"></script>
  <script src="/js/scripts/jquery.waypoints.min.js"></script>
  <script src="/js/scripts/jquery.stellar.min.js"></script>
  <script src="/js/scripts/owl.carousel.min.js"></script>
  <script src="/js/scripts/jquery.magnific-popup.min.js"></script>
  <script src="/js/scripts/aos.js"></script>
  <script src="/js/scripts/jquery.animateNumber.min.js"></script>
  <script src="/js/scripts/bootstrap-datepicker.js"></script>
  <script src="/js/scripts/jquery.timepicker.min.js"></script>
  <script src="/js/scripts/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/js/scripts/google-map.js"></script>
  <script src="/js/scripts/main.js"></script>



  </body>
</html>
