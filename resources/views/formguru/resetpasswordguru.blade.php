@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-danger ml-4 mt-3"><b>Update Password Anda</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/resetpassword/'.encrypt(auth()->user()->id)}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group">
      <table class="table has-feedback{{ $errors->has('old_password','password','password_confirmation') ? 'has-error' : '' }}" style="width:50%;margin-left:20%;">
      <tr>
				<td><label>NIP</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru->noinduk }}" readonly>
        </td>
			</tr>
      <tr>
				<td><label>Nama</label></td>
				<td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru->nama }}" readonly>
				</td>
			</tr>

      <tr>
				<td><label>Email</label></td>
				<td><input class="form-control" type="email" name="html_email" value="{{ $data_guru->email }}" readonly>
				</td>
			</tr>
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

    </table>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        @if( \Auth::user()->master_jabatan_id==1)
        <a class="btn btn-warning fa fa-undo" href="{{ url('/home') }}" role="button"> Cancel</a>
        @endif
      </div>
    </div>
  </div>
  </form>
  </div>
</div>
@endsection
