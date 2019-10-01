<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-learning</title>
    <link rel="shortcut icon" href="{{ asset('css/images/logomabal.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <aside id="left-panel" class="left-panel  position-fixed" style="height:100%; width:20%;">
        <nav class="navbar navbar-expand-sm navbar-default mt-2">
          <div class="container ml-5 text-center">
	  			      <img src="{{ asset('css/images/logomabal.png') }}" height="60%" width="60%">
	  		  </div><br>

            <div class="navbar-header">
                <a class="navbar-brand text-center"><h1>{{ Auth::user()->master_jabatan->nama }}<br/>{{ Auth::user()->nama }}</h1></a><br>
            </div>

            <!-- INI AKSES PUNYA ADMIN ------------------------------------------------------------------------>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('home') }}"> <i class="menu-icon fa fa-home"></i>Profile</a>
                    </li>
                    @if( \Auth::user()->master_jabatan_id==2)
                    <h3 class="menu-title text-center">Managament Data</h3>  <!-- /.menu-title -->
                    <li class="menu-item-has-children active">
                        <a href="{{ url('dataguru') }}"> <i class="menu-icon fa fa-street-view"></i>Data Guru</a>
                    </li>
                    <li class="menu-item-has-children active">
                        <a href="{{ url('datamurid') }}"> <i class="menu-icon fa fa-street-view"></i>Data Murid</a>
                    </li>
                    <li class="menu-item-has-children active">
                        <a href="{{ url('kelas') }}"> <i class="menu-icon fa fa-th-list"></i>Data Kelas</a>
                    </li>
                    <li class="menu-item-has-children active">
                        <a href="{{ url('mapel') }}"> <i class="menu-icon fa fa-th-list"></i>Data Mata Pelajaran</a>
                    </li>
                    @endif
                    @if( \Auth::user()->master_jabatan_id==1)
                    <li class="menu-item-has-children active">
                      <a href="{{ url('datapengajar') }}"> <i class="menu-icon fa fa-user"></i>Data Pengajar</a>
                    </li>
                    @endif
                    @if(App\master_kelas::where('master_data_id', auth()->user()->id)->count() == 1)
                    <li class="menu-item-has-children active">
                      <a href="{{ url('nilaimurid_kelas') }}"> <i class="menu-icon fa fa-folder"></i>Nilai Murid Kelas</a>
                    </li>
                    @endif
                    <h3 class="menu-title text-center">Extras</h3>  <!-- /.menu-title -->
                    <li class="menu-item-has-children active">
                      <a href="{{ url('dataujian') }}"> <i class="menu-icon fa fa-book"></i>Tugas/Ujian</a>
                    </li>
                    <li class="menu-item-has-children active">
                        <a href="{{ url('datamateri')}}"> <i class="menu-icon fa fa-file-text"></i>Meteri</a>
                    </li>
                    <li class="menu-item-has-children active">
                        <a href="{{ url('laporannilai/cari')}}"> <i class="menu-icon fa fa-folder"></i>Laporan Nilai Murid</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel" style="width:80%;">
        <!-- Header-->
        <header id="header" class="header" style="background-color:darkblue;" >
            <div class="header-menu">
                <div class="col-sm-7">
	  			          <img src="{{ asset('css/images/logoehome.jpg') }}" height="23%" width="35%">
                </div>
            </div>
                <div class="col-sm-5">.
                  @if( \Auth::user()->master_jabatan_id==2)
                  <div class="logoadmin text-right" style="margin-top:-30px;">
          	  			<img src="{{ asset('css/images/logoadmin.png') }}" height="28%" width="28%">
          	  		</div>
                  @endif
                  <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
                      @guest
                      @else
                          <li class="nav-item dropdown text-right">
                            <div class="btn-group btn-right" role="group">
                              <a class="dropdown-item text-light bg-danger fa fa-sign-out" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="border-radius:4px;">{{ __('LOGOUT') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
            </div>
        </header>
        <div style="background-color:lightgrey;margin-top:-5px;">
            <main class="py-5">
                @yield('content')
            </main>
        </div>
        <footer class="bg-dark text-center footer">
          <div class="container">
            <div class="row">
              <div class="col text-white text-center">
                <a>Copy Right 2019 </a>
              </div>
            </div>
          </div>
        </footer>
    </div>
</body>
</html>
