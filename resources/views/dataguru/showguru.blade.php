@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary card-header"><b>Managament Data Guru</b></h1>
  <p>
    <a class="btn btn-success ml-5 mt-1 fa fa-sign-out" href="{{ url('/dataguru') }}" role="button"> Back</a>
  </p>
  <table class="table" style="width:60%; margin-left:20%;margin-bottom:-1%">
    @foreach( $data_guru as $key => $show)
    <tr>
            <td>NIP</td>
            <td><input class="form-control" type="text"  value="{{ $show->noinduk }}" readonly></td>

            <td>Nama Lengkap</td>
            <td><input class="form-control" type="text"  value="{{ $show->nama }}" readonly></td>
    </tr>
    <tr>
            <td>Tgl.Lahir</td>
            <td><input class="form-control" type="text"  value="{{ $show->lahir }}" readonly></td>

            <td>Jenis Kelamin</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_gander->nama }}" readonly></td>
    </tr>
    <tr>
            <td>Agama</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_agama->nama }}" readonly></td>

            <td>No.Handphone</td>
            <td><input class="form-control" type="text"  value="{{ $show->nohandphone }}" readonly></td>
    </tr>
    <tr>
            <td>Email</td>
            <td><input class="form-control" type="text"  value="{{ $show->email}}" readonly></td>

            <td>Jabatan</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_jabatan->nama}}" readonly></td>
    </tr>
    <tr>
            <td>Alamat Lengkap</td>
            <td><textarea class="form-control" type="text" readonly>{{ $show->alamat }}</textarea></td>

            <td><label>Kelas Diajar</label></td>
            <td>
              @foreach ($data_pengajar as $pengajar)
              <input class="form-control" type="text"  value="{{ $pengajar->master_kelas->kelas }}" readonly>
              @endforeach
            </td>
    </tr>
    <tr>
            <td>Mata Pelajaran</td>
            <td><input class="form-control" type="text"  value="{{ $pengajar->master_mapel->nama }}" readonly></td>

            <td>Status</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_status->nama}}" readonly></td>
    </tr>
    @endforeach
  </table><br>
  </div>
</div>
@endsection
