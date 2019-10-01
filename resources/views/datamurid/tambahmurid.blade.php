@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-primary card-header"><b>Tambah Data Murid</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/datamurid') }}">
    @csrf
    <div class="form-group">
      <table class="table" style="width:80%; margin-top:-2%; margin-left:10%;">
      <tr class="has-feedback{{ $errors->has('html_nama','html_nis') ? 'has-error' : '' }}">
        <td><label>Nama Lengkap</label></td>
        <td><input class="form-control" type="text" name="html_nama"
                  placeholder="Nama Lengkap" value="{{ old('html_nama') }}" >
          @if($errors->has('html_nama'))
            <p class="text-danger">{{ $errors->first('html_nama') }}</p>
          @endif
        </td>

				<td><label>NIS</label></td>
				<td><input class="form-control" type="text" name="html_nis"
              placeholder="NIS" value="{{old('html_nis')}}">
          @if($errors->has('html_nis'))
            <p class="text-danger">{{ $errors->first('html_nis') }}</p>
          @endif
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_password','html_lahir') ? 'has-error' : '' }}">
				<td><label>Password</label></td>
				<td><input class="form-control" type="password" name="html_password"
                    placeholder="Password" value="{{ old('html_password') }}">
          @if($errors->has('html_password'))
            <p class="text-danger">{{ $errors->first('html_password') }}</p>
          @endif
				</td>

				<td><label>Tanggal Lahir</label></td>
				<td><input class="form-control" type="date" name="html_lahir" value="{{ old('html_lahir') }}">
          @if($errors->has('html_lahir'))
            <p class="text-danger">{{ $errors->first('html_lahir') }}</p>
          @endif
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_gander') ? 'has-error' : '' }}">
				<td><label>Jenis Kelamin</label></td>
				<td>
          @foreach($data_gander as $gander)
					<input type="radio" name="html_gander" value="{{ $gander->id }}">{{ $gander->nama}}
          @endforeach
          @if($errors->has('html_gander'))
            <p class="text-danger">{{ $errors->first('html_gander') }}</p>
          @endif
				</td>

				<td><label>Agama</label></td>
				<td>
					<select name="html_agama">
            @foreach ($data_agama as $agama)
              		<option value="{{ $agama->id }}">{{ $agama->nama}}</option>
            @endforeach
					</select>
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_ortu','html_hp') ? 'has-error' : '' }}">
				<td><label>Nama Orang Tua</label></td>
				<td><input class="form-control" type="text" name="html_ortu"
              placeholder="Nama Orang Tua" value="{{old('html_ortu')}}">
          @if($errors->has('html_ortu'))
            <p class="text-danger">{{ $errors->first('html_ortu') }}</p>
          @endif
				</td>

				<td><label>No.Handphone</label></td>
				<td><input class="form-control" type="text" name="html_hp"
              placeholder="No Handphone" value="{{old('html_hp')}}">
          @if($errors->has('html_hp'))
            <p class="text-danger">{{ $errors->first('html_hp') }}</p>
          @endif
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_alamat','html_tahunmasuk') ? 'has-error' : '' }}">
        <td><label>Alamat Lengkap</label></td>
        <td><textarea name="html_alamat" style="width:100%; height:70px;">{{old('html_alamat')}}</textarea>
          @if($errors->has('html_alamat'))
            <p class="text-danger">{{ $errors->first('html_alamat') }}</p>
          @endif
        </td>

        <td><label>Tahun Masuk</label></td>
        <td><input class="form-control" type="text" name="html_tahunmasuk"
                placeholder="Tahun Masuk" value="{{old('html_tahunmasuk')}}">
          @if($errors->has('html_tahunmasuk'))
            <p class="text-danger">{{ $errors->first('html_tahunmasuk') }}</p>
          @endif
        </td>
      </tr>
      <tr class="has-feedback{{ $errors->has('html_email') ? 'has-error' : '' }}">
        <td><label>Email</label></td>
        <td><input class="form-control" type="email" name="html_email"
                placeholder="email@email.com" value="{{old('html_email')}}">
          @if($errors->has('html_email'))
            <p class="text-danger">{{ $errors->first('html_email') }}</p>
          @endif
        </td>

				<td><label>Kelas</label></td>
				<td>
					<select name="html_kelas">
            @foreach ($data_kelas as $kelas)
              		<option value="{{ $kelas->id }}">{{ $kelas->kelas}}</option>
            @endforeach
					</select>
				</td>
			</tr>

    </table>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/datamurid') }}" role="button"> Cancel</a>
      </div>
    </div>
  </div>
  </form>
  </div>
</div><br><br>
@endsection
