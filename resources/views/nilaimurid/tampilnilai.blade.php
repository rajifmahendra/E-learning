@extends('layouts.homes')

@section('content')
<div class="container">
    @csrf
    <h1 class="text-primary"><b>Info Data Nilai Murid</b></h1><br>
    <p>
      <a class="btn btn-success fa fa-undo" href="{{ url('/dataujian') }}" style="border-radius:5px;" role="button"> Back</a>
    </p>
  <form class="form-horizontal" method="POST" action="{{ url('/tampilnilai/{id}') }}">
  <table class="table bg-dark text-danger" style="width:95%; margin-left:3%; border-radius:8px;">
    <tr>
      <td><label>Nama Guru</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->data_pengajar->master_data->nama }}" readonly></td>

      <td><label>Tipe Soal</label></td>
      <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->master_ujian_tipe->tipe}}" readonly></td>

      <td><label>Kelas</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->data_pengajar->master_kelas->kelas }}" readonly></td>

      <td><label>Mata Pelajaran</label></td>
      <td><input class="form-control" type="text" name="html_nik" value="{{ $data_ujian->data_pengajar->master_mapel->nama}}" readonly></td>
    </tr>
  </table>
  <table class="table text-dark text-center" style="border-radius:13px; width:60%;margin-left:18%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Nama Murid</td>
      <td>Nilai</td>
      <td>Action</td>
    </tr>
    @foreach($data_siswa_ujian as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ $value->nama}}</td>
      <td>{{ $value->nilai}}</td>
      <td>
        @if($value->nilai)
          <a href="{{ url('/tampiljawaban/'.$value->idnya) }}" class="btn btn-sm btn-primary fa fa-history"> Lihat Jawaban</a>
        @endif
      </td>
    </tr>
    @endforeach
  </table><br>
  </form>
</div>
@endsection
