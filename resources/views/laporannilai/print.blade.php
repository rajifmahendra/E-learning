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
  <div>
    <h1 onclick="window.print()" class="text-primary text-center mt-5"><b>Laporan Nilai Murid</b></h1><br>
  <img src="{{ asset('css/images/logomabal.png') }}" height="10%" width="10%" style="margin-top:-13%;margin-left:5%;">
  </div>
    <form class="form-horizontal" method="POST" action="{{ url('print/{id}') }}">
      @csrf
      <div class="form-group">
        <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
          <tr>
              <td><label>Nama Guru</label></td>
              <td><input class="form-control" type="text" name="html_nama" value="{{ $data_pengajar->master_data->nama}}" readonly></td>

              <td><label>Mata Pelajaran</label></td>
              <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_pengajar->master_mapel->nama }}" readonly></td>
          </tr>
          <tr>
              <td><label>Kelas</label></td>
              <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_pengajar->master_kelas->kelas }}" readonly></td>

              <td><label>Wali Kelas</label></td>
              <td><input class="form-control" type="text" name="html_nik" value="{{ $data_pengajar->master_kelas->master_data->nama }}" readonly></td>
          </tr>
      </table>
      </div>
      <table class="table text-dark text-center" style="width:70%; margin-left:15%;">
        <tr class="bg-dark text-light">
          <td>No</td>
          <td>Nama Murid</td>
          <td>40%<br/>Tugas</td>
          <td>30%<br/>UTS</td>
          <td>30%<br/>UAS</td>
          <td>Total</td>
          <td>Status</td>
        </tr>
        @foreach($nilai_murid as $key => $value)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $value->nama }}</td>
          <td>{{ $value->tugas }}</td>
          <td>{{ $value->uts }}</td>
          <td>{{ $value->uas }}</td>
          <td>{{ $value->total }}</td>
          @if($value->total)
          <td>{{ $value->status_ujian }}</td>
          @else
          <td></td>
          @endif
        </tr>
        @endforeach
      </table>
    </form>
</body>
</html>
