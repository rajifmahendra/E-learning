@extends('layouts.homemurid')

@section('content')
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  <h1 class="text-primary card-header bg-secondary"><b>Tugas/Ujian</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/tipeujian/{id}') }}">
    @csrf
      <h3 class="mx-4"><u>Info Data Murid</u></h3><br>
    <div class="form-group">
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
        <h3 class="mx-4 mt-3"><u>Info Data Guru</u></h3><br>
      <table class="table bg-dark text-danger" style="width:65%; margin-left:16%; border-radius:8px;">
        <tr>
  				<td><label>Nama Lengkap Guru</label></td>
  					<td><input class="form-control" type="text" name="html_nik" value="{{ $data_pengajar->master_data->nama }}" readonly></td>

  				<td><label>Mata Pelajaran</label></td>
            <td><input class="form-control" type="text" name="html_nama" value="{{ $data_pengajar->master_mapel->nama}}" readonly></td>

  			</tr>
      </table>
    </div>
    <a class="btn btn-success ml-5 mb-3 fa fa-undo" href="{{ url('/datasoal') }}" role="button"> Back</a>
      <div class="form-group">
        @if(count($data_ujian)>=1)
        <h3 class="ml-4"><u>Pilih Topik Tugas/Ujian</u></h3><br>
        <table class="table text-light text-left" style="border-radius:13px; width:70%;margin-left:13%;">
          <tr class="bg-secondary text-light">
            <td><b>No</b></td>
            <td><b>Tipe Soal</b></td>
            <td><b>Keterangan</b></td>
            <td class="text-center"><b>Waktu<br/>(Menit)</b></td>
            <td class="text-center"><b>Semester</b></td>
            <td class="text-center"><b>Nilai<b></td>
            <td><b>Action</b></td>
          </tr>
          @foreach($hasil_nilai_murid as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->tipe}}</td>
            <td>{{ $value->keterangan}}</td>
            <td class="text-center">{{ $value->waktu}} Menit</td>
            <td class="text-center">{{ $value->semester}}</td>
            <td class="text-center">{{ $value->nilai}}</td>
            <td>
                @if(!$value->nilai)
                <a href="{{ url('/datasoal/'.$value->id)}}" class="btn btn-sm btn-primary fa fa-check"> Pilih</a>
                @endif
            </td>
          </tr>
          @endforeach
        </table><br>
        @else
        <h3 class="text-center text-danger mt-5">Data Belum Tersedia</h3>
        @endif
      </div>
  </form>
</div>
@endsection
