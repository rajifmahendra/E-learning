@extends('layouts.homemurid')

@section('content')
<div class="row fullscreen d-flex justify-content-center mt-5">
  <h1 class="mt-5"><b>Update Password Anda</b></h1><br>
<div class="container">
  <form class="form-horizontal" method="POST" action="{{'/resetpassword/'.encrypt(auth()->user()->id)}}">
    @method('PATCH')
    @csrf
      <table class="table text-light">
      <tr>
				<td><label>NIS</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru->noinduk }}" readonly>

				<td><label>Nama Lengkap</label></td>
				<td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru-> nama }}" readonly>
				</td>
			</tr>
      <tr>
        <td><label>Kelas</label></td>
        <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_guru->master_kelas->kelas }}" readonly>
        </td>

				<td><label>Tanggal Lahir</label></td>
				<td><input class="form-control" type="date" name="html_lahir" value="{{ $data_guru-> lahir }}" readonly>
				</td>
			</tr>
      <tr>
				<td><label>Nama Orang Tua</label></td>
				<td><input class="form-control" type="text" name="html_ortu" value="{{ $data_guru->nama_ortu }}" readonly>
				</td>

				<td><label>Email</label></td>
				<td><input class="form-control" type="email" name="html_email" value="{{ $data_guru->email }}" readonly>
				</td>
			</tr>
    </table>
    <table class="table text-light" style="width:50%;margin-left:25%;">
      <tr>
				<td><label>Password Lama</label></td>
        <td><input class="form-control" type="password" name="old_password" placeholder="Password Lama">
          @if($errors->has('old_password'))
          <p class="text-danger">{{ $errors->first('old_password') }}</p>
          @endif
				</td>
      </tr>
      <tr>
				<td><label>New Password</label></td>
				<td><input class="form-control" type="password" name="password" placeholder="New Password">
          @if($errors->has('password'))
          <p class="text-danger">{{ $errors->first('password') }}</p>
          @endif
				</td>
			</tr>
      <tr>
				<td><label>New Password (Ulangi)</label></td>
				<td><input class="form-control" type="password" name="password_confirmation" placeholder="Ulangi New Password">
          @if($errors->has('password_confirmation'))
          <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
          @endif
				</td>
			</tr>
    <table>
    <div class="form-group ml-4 mt-5">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/home') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
