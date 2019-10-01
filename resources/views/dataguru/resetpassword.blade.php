@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:17%;">
<div class="card">
  <h1 class="text-danger card-header"><b>Reset Password Data Guru</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/dataguru/resetpassword/'.$data_guru->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group">
      <table class="table" style="width:50%;margin-left:20%;">
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
      <tr class="has-feedback{{ $errors->has('html_password') ? 'has-error' : '' }}">
				<td><label>Password Baru</label></td>
				<td><input class="form-control"  type="password" name="html_password" placeholder="Password Baru">
          @if($errors->has('html_password'))
            <p class="text-danger">{{ $errors->first('html_password') }}</p>
          @endif
				</td>
			</tr>
    </table>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/dataguru') }}" role="button"> Cancel</a>
      </div>
    </div><br><br>
  </div>
</form>
  </div>
</div>
@endsection
