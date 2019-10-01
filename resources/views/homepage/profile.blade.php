@extends('layouts.homes')

@section('content')
<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary card-header mt-3"><b>Hallo, My Profile</b></h1>
  <table class="table" style="width:60%; margin-left:20%; margin-bottom:22%;">
    <tr>
            <td><b>NIP</b></td>
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

            <td><b>No.Handphone</b></td>
            <td><i>{{$profile->nohandphone}}</i></td>
    </tr>
    <tr>
            <td><b>Email</b></td>
            <td><i>{{$profile->email}}</i></td>

            <td><b>Jabatan</b></td>
            <td><i>{{$profile->master_jabatan->nama}}</i></td>
    </tr>
    <tr>
            <td><b>Alamat Lengkap</b></td>
            <td><i>{{$profile->alamat}}</i></td>
    <tr>
            @if( \Auth::user()->master_jabatan_id==1)
            <td><a href="{{ url('/resetpassword')}}" class="btn btn-sm btn-primary fa fa-repeat"> Ubah Password</a></td>
            @endif
            @if( \Auth::user()->master_jabatan_id==2)
            <td><a href="{{ url('/dataguru/'.$profile->id.'/resetpassword')}}" class="btn btn-sm btn-primary fa fa-repeat"> Ubah Password</a></td>
            @endif
    </tr>
  </table>
</div>
@endsection
