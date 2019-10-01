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
    <h1 onclick="window.print()" class="text-primary text-center mt-5"><b>Soal Ujian Murid</b></h1><br>
  <img src="{{ asset('css/images/logomabal.png') }}" height="10%" width="10%" style="margin-top:-13%;margin-left:5%;">
  </div>
    <form class="form-horizontal" method="POST" action="{{ url('soal/print/{id}') }}">
      @csrf
      <div class="form-group">
        <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
          <tr>
    				<td><label>Tipe Ujian</label></td>
                  <td><input class="form-control" type="text" name="html_tipe" value="{{ $data_ujian->master_ujian_tipe->tipe }}" readonly>
                  </td>
    				<td><label>Nama Guru</label></td>
                  <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_ujian->data_pengajar->master_data->nama }}" readonly>
                  </td>
      			<td><label>Kelas</label></td>
                  <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_ujian->data_pengajar->master_kelas->kelas }}" readonly>
                  </td>
    			</tr>
          <tr>
    				<td><label>Mata Pelajaran</label></td>
                  <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_ujian->data_pengajar->master_mapel->nama }}" readonly>
                  </td>
    				<td><label>Waktu (Menit)</label></td>
          				<td><input class="form-control" type="text" name="html_waktu" value="{{ $data_ujian->waktu }} Menit" readonly>
          				</td>
    			</tr>
      </table>
      </div>
      <table class="table text-dark text-center" style="width:70%; margin-left:6.5%;">
        <tr class="bg-dark text-light">
          <td>No</td>
          <td>Pertanyaan</td>
          <td>Pilihan A</td>
          <td>Pilihan B</td>
          <td>Pilihan C</td>
          <td>Pilihan D</td>
          <td>Pilihan E</td>
          <td>Jawaban</td>
        </tr>
        <?php $no =1; ?>
        @foreach($data_soal as $key => $value)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $value->pertanyaan}}</td>
          <td>{{ $value->pilihan_a}}</td>
          <td>{{ $value->pilihan_b}}</td>
          <td>{{ $value->pilihan_c}}</td>
          <td>{{ $value->pilihan_d}}</td>
          <td>{{ $value->pilihan_e}}</td>
          <td>{{ $value->jawaban}}</td>
        </tr>
        @endforeach
      </table>
    </form>
</body>
</html>
