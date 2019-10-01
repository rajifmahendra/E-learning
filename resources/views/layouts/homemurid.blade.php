<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-learning</title>
  <link rel="shortcut icon" href="{{ asset('css/images/logomabal.png') }}">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <!--  JS  ============================================= -->
  <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
  <script src="{{ asset('js/main2.js') }}"></script>
    <!--  CSS  ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemurid.css') }}">

  </head>
  <body class="banner-area">
      <header id="header" id="home">
        <div class="container main-menu bg-info">
          <div class="row align-items-center justify-content-between d-flex">
            <img src="{{ asset('css/images/logomabal.png') }}" style="width:7%;">
            <img src="{{ asset('css/images/logoehome.jpg') }}" style="width:20%;margin-left:20%;">

          <nav>
            <ul class="nav-menu mt-2">
              <li class="fa fa-home mt-2"><a href="{{ url('home') }}">Profile</a></li>
              <li class="fa fa-book mt-2"><a href="{{ url('datasoal')}}">Tugas/Ujian</a></li>
              <li class="fa fa-download mt-2"><a href="{{ url('materimurid')}}">Materi</a></li>
              <li style="margin-top:-10%;">
                  <a class="dropdown-item text-light bg-danger fa fa-sign-out" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="border-radius:4px;">{{ __('LOGOUT') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
            </ul>
          </nav><!-- #nav-menu-container -->
          </div>
        </div>
      </header>
      <!-- #header -->
    <section>
      <div>
      <div class="container">
        <div class="row fullscreen d-flex justify-content-center">
          <div class="justify-content-center bg-dark" style="margin-top:6%;">
            @yield('content')
          </div>
        </div>
      </div>
      </div>
    </section>
  </body>
</html>
