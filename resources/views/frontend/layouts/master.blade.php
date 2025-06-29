<!doctype html>


<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="WishFund,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">
    
  <!-- theme meta -->
  <meta name="theme-name" content="wishfund-bulma" />

  <title>@yield('title')</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/bulma/bulma.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/icofont/icofont.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/slick-carousel/slick/slick-theme.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/plugins/modal-video/modal-video.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">

</head>

<body>

<!-- Header Start --> 
@include('frontend.layouts.header')
<!-- Header Close -->
@yield('content')

<!-- footer Start -->
    @include('frontend.layouts.footer')


    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{asset('frontend')}}/js/contact.js"></script>
   <!--  Magnific Popup-->
    <script src="{{asset('frontend')}}/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="{{asset('frontend')}}/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="{{asset('frontend')}}/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/counterup/jquery.counterup.min.js"></script>

    <script src="{{asset('frontend')}}/plugins/modal-video/jquery-modal-video.min.js"></script>
<!-- Add this in your <head> or before </body> in master.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Map -->
    {{-- <script src="{{asset('frontend')}}/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>     --}}
    
    <script src="{{asset('frontend')}}/js/script.js"></script>

  </body>
  </html>
   
