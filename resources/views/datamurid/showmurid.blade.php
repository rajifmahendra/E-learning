@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:-1%">
<div class="card">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary card-header"><b>Managament Data Murid</b></h1>
  <p>
    <a class="btn btn-success ml-5 mt-1 fa fa-undo" href="{{ url('/datamurid') }}" role="button"> Back</a>
  </p>
  <table class="table" style="width:70%; margin-left:16%;">
    @foreach( $data_murid as $key => $show)
    <tr>
            <td>NIS</td>
            <td><input class="form-control" type="text"  value="{{ $show->noinduk }}" readonly></td>

            <td>Nama Lengkap</td>
            <td><input class="form-control" type="text"  value="{{ $show->nama}}" readonly></td>
    </tr>
    <tr>
            <td>Tgl.Lahir</td>
            <td><input class="form-control" type="text"  value="{{ $show->lahir}}" readonly></td>

            <td>Jenis Kelamin</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_gander->nama }}" readonly></td>
    </tr>
    <tr>
            <td>Agama</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_agama->nama }}" readonly></td>

            <td>Nama Orang Tua</td>
            <td><input class="form-control" type="text"  value="{{ $show->nama_ortu }}" readonly></td>
    </tr>
    <tr>
            <td>No.Handphone</td>
            <td><input class="form-control" type="text"  value="{{ $show->nohandphone }}" readonly></td>

            <td>Email</td>
            <td><input class="form-control" type="text"  value="{{ $show->email }}" readonly></td>
    </tr>
    <tr>
            <td>Tahun Masuk</td>
            <td><input class="form-control" type="text"  value="{{ $show->tahun_masuk }}" readonly></td>

            <td>Kelas</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_kelas->kelas}}" readonly></td>
    </tr>
    <tr>
            <td>Alamat Lengkap</td>
            <td><textarea class="form-control" type="text" readonly>{{ $show->alamat}}</textarea></td>

            <td>Status</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_status->nama }}" readonly></td>
    </tr>
    <tr>
            <td>Jabatan</td>
            <td><input class="form-control" type="text"  value="{{ $show->master_jabatan->nama }}" readonly></td>
    </tr>
    @endforeach
  </table><br>
  </div>
</div>
@endsection
