@extends('layouts.homes')

@section('content')
<div class="container"style="margin-bottom:12%;">
  <div class="card">
  <h1 class="text-danger card-header"><b>Reset Password Data Murid</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/datamurid/resetpassword/'.$data_murid->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group">
      <table class="table" style="width:70%;margin-left:15%;">
      <tr>
				<td><label>NIS</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid->noinduk }}" readonly>


				<td><label>Nama Lengkap</label></td>
				<td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid-> nama }}" readonly>
				</td>
			</tr>
      <tr>
        <td><label>Kelas</label></td>
        <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_murid->master_kelas->kelas }}" readonly>
        </td>

				<td><label>Tanggal Lahir</label></td>
				<td><input class="form-control" type="date" name="html_lahir" value="{{ $data_murid-> lahir }}" readonly>
				</td>
			</tr>
      <tr>
				<td><label>Nama Orang Tua</label></td>
				<td><input class="form-control" type="text" name="html_ortu" value="{{ $data_murid->nama_ortu }}" readonly>
				</td>

				<td><label>Email</label></td>
				<td><input class="form-control" type="email" name="html_email" value="{{ $data_murid->email }}" readonly>
				</td>
			</tr>
    </table>
    <table class="table" style="width:50%;margin-left:23%;">
      <tr class="has-feedback{{ $errors->has('html_password') ? 'has-error' : '' }}">
				<td class="text-center"><label>Password Baru</label></td>
				<td><input class="form-control"  type="password" name="html_password" placeholder="Password Baru">
          @if($errors->has('html_password'))
            <p class="text-danger">{{ $errors->first('html_password') }}</p>
          @endif
				</td>
			</tr>

    </table>
    <dixv class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/datamurid') }}" role="button"> Cancel</a>
      </div>
    </div><br><br>
  </div>
  </form>
</div>
@endsection
