@extends('layouts.homemurid')

@section('content')
<div class="container mt-5">
  <h1 class="text-primary card-header bg-secondary"><b>Tugas/Ujian</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/datasoal') }}">
    @csrf
    <h3 class="ml-4"><u>Info Data Murid</u></h3><br>
    <div>
    <table class="table bg-dark text-danger" style="width:85%; margin-left:8%; border-radius:8px;">
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
    <h3 class="mx-4 mt-3"><u>Info Data Guru</u></h3><br>
  <table class="table bg-dark text-danger" style="width:65%; margin-left:16%; border-radius:8px;">
    <tr>
      <td><label>Nama Lengkap Guru</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->data_pengajar->master_data->nama }}" readonly></td>

      <td><label>Mata Pelajaran</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_ujian->data_pengajar->master_mapel->nama}}" readonly></td>

    </tr>
  </table>
    <a class="btn btn-success ml-5 fa fa-undo" href="{{ url('/datasoal') }}" role="button"> Back</a>
      <h3 class="card-header"><u>Data Soal</u></h3>
      <div style="margin-left:28%;">
              <h3 class="text-info">Informasi Mengerjakan :</h3><br>
              <h5 class="text-light">1. Baca dengan Seksama dan Teliti sebelum mengerjakan.</h5>
              <h5 class="text-light">2. Pastikan koneksi internet stabil dan aman.</h5>
              <h5 class="text-light">3. Jika mati lampu harap segera hubungi guru terkait.</h5>
              <h5 class="text-light">4. Gunakan Google Chrome.</h5>
      </div><br>
      <div class="form-group">
        <table class="table bg-dark text-danger" style="width:40%; margin-left:30%; border-radius:8px;">
        <tr>
            <td><label>Tipe Soal</label></td>
            <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->master_ujian_tipe->tipe}}" readonly></td>
        </tr>
        <tr>
          <td><label>Keterangan Soal</label></td>
            <td><textarea class="form-control" name="html_nik" readonly>{{ $data_ujian->keterangan}}</textarea></td>
        </tr>
        <tr>
          <td><label>Waktu (Menit)</label></td>
            <td><input class="form-control" type="text" name="html_nama" value="{{ $data_ujian->waktu}} Menit" readonly></td>
        </tr>
      </table>
    </div>
      <a class="btn btn-info ml-5 mb-3 fa fa-play" href="{{ url('/tampilsoal/'.$data_ujian->id)}}" role="button"
      onclick="return confirm('Apakah Anda Yakin Ingin Mengerjakan?')"> Mulai Mengerjakan</a>
        <!-- <a href="#" onclick="window.open('/tampilsoal/{{$data_ujian->id}}', 'liveMatches', 'width=1020,height=800,toolbar=0,location=0, directories=0, status=0,location=0,menubar=0')" rel="nofollow"
         class="btn btn-primary fa fa-print" target="_blank" style="border-radius:5px;" role="button" onclick="return confirm('Apakah Anda Yakin Ingin Mengerjakan?')"> Mulai Mengerjakan</a> -->
  </form>
  </div>
@endsection
