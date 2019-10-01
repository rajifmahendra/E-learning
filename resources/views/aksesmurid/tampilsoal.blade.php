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
          </div>
        </div>
      </header>
      <!-- #header -->
    <section>
      <div>
      <div class="container">
        <div class="row fullscreen d-flex justify-content-center">
          <div class="justify-content-center bg-dark" style="margin-top:6%;">
<div class="container">
<div class="card mt-5">
            <style scoped="scoped" type="text/css">
                #countdownpenaindigo {background:black;color:yellow;font-family:Oswald, Arial, Sans-serif;
                font-size:20px;text-transform:uppercase;text-align:center;padding:10px 0;font-weight:normal;}
                .teks {color:white}
            </style>
            <div id="countdownpenaindigo">
                <span id="countdown"></span>
            </div>
            <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
            <script type="text/javascript">
            <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
            <script type="text/javascript">
            var finish = new Date("sept 15, 2019, 21:33").getTime();
            var hours, minutes, seconds;
            var countdown = document.getElementById("countdown");
            setInterval(function(){
            var current_date = new Date().getTime();
            var seconds_left = (finish - current_date) / 1000;
            seconds_left = seconds_left % 86400;
            hours = parseInt(seconds_left / 3600);
            seconds_left = seconds_left % 3600;
            minutes = parseInt(seconds_left / 60);
            seconds = parseInt(seconds_left % 60);
            // format countdown string + set tag value
            //LK
            if(current_date>=finish){
              $("#waktu");
            }else{
              countdown.innerHTML = "<span class='text'>Waktu Anda Tersisa</span> : " + hours + " <span class='teks'>jam</span> "
              + minutes + " <span class='teks'>menit</span> " + seconds + " <span class='teks'>detik</span>";
            }
            }, 10);
            // ]]>
            </script>
            <!-- </script> -->
  <form class="form-horizontal" method="POST" action="{{ url('/tampilsoal/{id}') }}">
    @csrf
    <h3 class="card-header"><u>Info Data Murid</u></h3><br>
    <div>
    <table class="table bg-dark text-danger" style="width:75%; margin-left:13%; border-radius:8px;">
      <tr>
        <td><label>NIS</label></td>
          <td><input class="form-control" type="text" name="html_nik" value="{{ $data_murid->noinduk }}" readonly></td>

        <td><label>Nama Lengkap</label></td>
          <td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid->nama}}" readonly></td>

        <td><label>Jenis Kelamin</label></td>
          <td><input class="form-control" type="text" name="html_thnmasuk" value="{{ $data_murid->master_gander->nama }}" readonly></td>
      </tr>
      <tr>
        <td><label>Kelas</label></td>
          <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_murid->master_kelas->kelas}}" readonly></td>

        <td><label>Tgl.Lahir</label></td>
          <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_murid->lahir }}" readonly></td>

        <td><label>Email</label></td>
          <td><input class="form-control" type="text" name="html_email" value="{{ $data_murid->email}}" readonly></td>
      </tr>
    </table>
    </div>
    <h3 class="card-header"><u>Info Data Soal</u></h3><br>
    <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
    <input type="hidden" name="data_ujian_id" value="{{ $data_ujian->id}}">
      <tr>
        <td><label>Nama Lengkap Guru</label></td>
          <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->data_pengajar->master_data->nama }}" readonly></td>

        <td><label>Mata Pelajaran</label></td>
          <td><input class="form-control" type="text" name="html_nama" value="{{ $data_ujian->data_pengajar->master_mapel->nama}}" readonly></td>

          <td><label>Keterangan Soal</label></td>
          <td><textarea class="form-control" type="text" name="html_nama" readonly>{{ $data_ujian->keterangan}}</textarea></td>
      </tr>
      <tr>
        <td><label>Tipe Ujian</label></td>
          <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->master_ujian_tipe->tipe}}" readonly></td>

        <td><label>Waktu (Menit)</label></td>
          <td><input class="form-control" type="text" name="html_thnmasuk" value="{{ $data_ujian->waktu }} Menit" readonly></td>
      </tr>
    </table><br>
  </form>
    <h2 class="card-header bg-secondary"><u>Silahkan Jawab Soal Anda.</u></h2><br>
    <form action="{{ url('/tampilsoal/'.$data_ujian->id.'/selesai')}}" class="form-horizontal" method="POST">
    <table class="table" style="width:90%; margin-left:5%; border-radius:8px;">
      @csrf
      @foreach($data_soal as $key =>$soal)
      <input type="hidden" value="{{$soal->id}}" name="soal_id[]">
        <tr>
          <td><h4 class="text-info mt-3">Soal No. {{$key+1}}<br>{{ $soal->pertanyaan}}<h4></td>
        </tr>
        <tr>
          <td><h5><input type="radio" name="chk[{{$soal->id}}]" value="A"> A. {{ $soal->pilihan_a }} </h5></td>
        </tr>
        <tr>
          <td><h5><input type="radio" name="chk[{{$soal->id}}]" value="B"> B. {{ $soal->pilihan_b }} </h5></td>
        </tr>
        <tr>
          <td><h5><input type="radio" name="chk[{{$soal->id}}]" value="C"> C. {{ $soal->pilihan_c }} </h5></td>
        </tr>
        <tr>
          <td><h5><input type="radio" name="chk[{{$soal->id}}]" value="D"> D. {{ $soal->pilihan_d }} </h5></td>
        </tr>
        <tr>
          <td><h5><input type="radio" name="chk[{{$soal->id}}]" value="E"> E. {{ $soal->pilihan_e }} </h5></td>
        </tr>
        @endforeach
      </table><br>
    <div class="form-group ml-5">
      <div class="col-sm-offset-0 col-sm-10 mb-3">
        <button type="submit" id="waktu" class="btn btn-primary fa fa-thumbs-o-up" onclick="return confirm('Apakah Anda Yakin Dengan Jawaban Anda?')"> Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>
