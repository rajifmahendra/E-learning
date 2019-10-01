@extends('layouts.homemurid')

@section('content')
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<div class="row fullscreen d-flex justify-content-center bg-dark" style="width:136%; margin-left:-18%; margin-top:-9%;">
  <table class="table text-light" style="border-radius:13px; width:90%; margin-top:-10%; margin-bottom:10%;">
    <tr>
      <h1 class="text-warning" style="margin-top:20%;"><b>Hallo, My Profile</b></h1>
            <td><b>NIS</b></td>
            <td><i>{{$profile->noinduk}}</i></td>

            <td><b>Nama Lengkap</b></td>
            <td><i>{{$profile->nama}}</i></td>
    </tr>
    <tr>
            <td><b>Tgl.Lahir</b></td>
            <td><i>{{$profile->lahir}}</i></td>

            <td><b>Jenis Kelamin</b></td>
            <td><i>{{$profile->master_gander->nama}}</i></td>
    </tr>
    <tr>
            <td><b>Agama</b></td>
            <td><i>{{$profile->master_agama->nama}}</i></td>

            <td><b>Nama Orang Tua</b></td>
            <td><i>{{$profile->nama_ortu}}</i></td>
    </tr>
    <tr>
            <td><b>No.Handphone</b></td>
            <td><i>{{$profile->nohandphone}}</i></td>

            <td><b>Email</b></td>
            <td><i>{{$profile->email}}</i></td>
    </tr>
    <tr>
            <td><b>Tahun Masuk</b></td>
            <td><i>{{$profile->tahun_masuk}}</i></td>

            <td><b>Kelas</b></td>
            <td><i>{{$profile->master_kelas->kelas}}</i></td>
    </tr>
    <tr>
            <td><b>Alamat Lengkap</b></td>
            <td><i>{{$profile->alamat}}</i></td>

            <td></td>
            <td></td>
    </tr>
    <tr>
            <td><a href="{{ url('/resetpassword')}}" class="btn btn-sm btn-primary fa fa-repeat"> Ubah Password</a></td>
            <td></td>
            <td></td>
            <td></td>
    </tr>
  </table>
</div>
</div>
@endsection
