@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:31%;">
<div class="card">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary card-header"><b>Tambah Materi</b></h1><br>
  <!--jika Login sebagai ADMIN -->
  @if( \Auth::user()->master_jabatan_id==2)
  <h3 class="ml-5"><u>Cari Data Guru</u></h3>
  <p>
    <form action="/cari/dataguru" method="POST" class="form-inline" style="margin-left:2%; margin-top:15px;">
        @csrf
        <a class="btn btn-success fa fa-undo" href="{{ url('/datamateri') }}" style="border-radius:5px;" role="button"> Back</a>
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Cari Data Guru" value="{{ old('search') }}" style="width:83%;">
        <button type="submit"  class="btn btn-success fa fa-search-plus" style="border-radius:10px; background-color:lightgreen; border:none;"> Search</button>
    </form>
  </p>
  @if($tampil_data)
  @if(count($hasil)>=1)
  <table class="table text-dark text-center" style="width:80%; margin-left:10%";>
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIK</td>
      <td>Nama Guru</td>
      <td>kelas</td>
      <td>Mata Pelajaran</td>
      <td>Action</td>
    </tr>
    @foreach($hasil as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ $value->noinduk}}</td>
      <td>{{ $value->nama}}</td>
      <td>{{ $value->master_kelas->kelas}}</td>
      <td>{{ $value->master_mapel->nama}}</td>
      <td>
          <a href="{{ url('/datamateri/'.$value->id)}}" class="btn btn-sm btn-primary">Pilih</a>
      </td>
    </tr>
    @endforeach
  </table>
  @else
  <h3 class="text-center">Data Tidak Tersedia</h3><br>
  @endif
  @endif
  @endif
  <!--jika Login sebagai Guru -->
  @if( \Auth::user()->master_jabatan_id==1)
  <h3 class="ml-5"><u>Pilih Data Pengajar</u></h3>
  <p>
  <form action="/cari/dataguru" method="POST" class="form-inline" style="margin-left:2%; margin-top:15px;">
      @csrf
      <a class="btn btn-success " href="{{ url('/datamateri') }}" style="border-radius:5px;" role="button">Back</a>
  </form>
  </p>
  <table class="table text-dark text-center" style="width:80%; margin-left:10%";>
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIK</td>
      <td>Nama Guru</td>
      <td>kelas</td>
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
          <a href="{{ url('/datamateri/'.$value->id)}}" class="btn btn-sm btn-primary">Pilih</a>
      </td>
    </tr>
    @endforeach
  </table>
  @endif
</div>
</div>
@endsection
