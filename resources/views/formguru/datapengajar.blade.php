@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:31%;">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Data Pengajar Guru {{ Auth::user()->nama }}</b></h1>
  <p>
  </p>
  <table class="table text-dark text-center" style="width:70%;margin-left:15%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIK</td>
      <td>Nama Guru</td>
      <td>Kelas</td>
      <td>Mata Pelajaran</td>
      <td>Action</td>
    </tr>
    @foreach($data_pengajar as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ $value->master_data->noinduk}}</td>
      <td>{{ $value->master_data->nama}}</td>
      <td>{{ $value->master_kelas->kelas}}</td>
      <td>{{ $value->master_mapel->nama}}</td>
      <td>
          <a href="{{ url('/datapengajar/'.$value->master_kelas_id )}}" class="btn btn-sm btn-primary fa fa-user"> Lihat Murid</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
