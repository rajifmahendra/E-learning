@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-primary card-header"><b>Edit Data Murid</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/datamurid/'.$data_murid->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group">
      <table class="table" style="width:30%; margin-left:33%; margin-top:-2%;">
      <tr>
        <td>
				<td><label>NIS</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid->noinduk }}" readonly>
        </td>
			</tr>
    </table>
    <table class="table" style="width:75%; margin-left:13%;margin-bottom:-0.5%;">
      <tr class="has-feedback{{ $errors->has('html_nama','html_lahir') ? 'has-error' : '' }}">
				<td><label>Nama Lengkap</label></td>
				<td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid-> nama }}" >
          @if($errors->has('html_nama'))
            <p class="text-danger">{{ $errors->first('html_nama') }}</p>
          @endif
				</td>

				<td><label>Tanggal Lahir</label></td>
				<td><input class="form-control" type="date" name="html_lahir" value="{{ $data_murid-> lahir }}">
          @if($errors->has('html_lahir'))
            <p class="text-danger">{{ $errors->first('html_lahir') }}</p>
          @endif
				</td>
			</tr>
      <tr>
				<td><label>Jenis Kelamin</label></td>
        <td>
          @foreach($data_gander as $gander)
            @if($gander->id == $data_murid->master_gander_id)
              <input type="radio" name="html_gander" value="{{ $gander->id }}" checked>{{ $gander->nama}}
            @else
              <input type="radio" name="html_gander" value="{{ $gander->id }}">{{ $gander->nama}}
            @endif
          @endforeach
        </td>

				<td><label>Agama</label></td>
				<td>
					<select name="html_agama">
            @foreach ($data_agama as $agama)
              @if($agama->id == $data_murid->master_agama_id)
              		<option value="{{ $agama->id }}" selected>{{ $agama->nama}}</option>
              @else
                  <option value="{{ $agama->id }}">{{ $agama->nama}}</option>
              @endif
            @endforeach
					</select>
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_alamat','html_ortu') ? 'has-error' : '' }}">
        <td><label>Alamat Lengkap</label></td>
        <td><textarea name="html_alamat" style="width:100%; height:70px;">{{ $data_murid->alamat }}</textarea>
          @if($errors->has('html_alamat'))
            <p class="text-danger">{{ $errors->first('html_alamat') }}</p>
          @endif
        </td>

				<td><label>Nama Orang Tua</label></td>
				<td><input class="form-control" type="text" name="html_ortu" value="{{ $data_murid->nama_ortu }}" >
          @if($errors->has('html_ortu'))
            <p class="text-danger">{{ $errors->first('html_ortu') }}</p>
          @endif
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_email') ? 'has-error' : '' }}">
        <td><label>Email</label></td>
        <td><input class="form-control" type="email" name="html_email" value="{{ $data_murid->email }}" >
          @if($errors->has('html_email'))
            <p class="text-danger">{{ $errors->first('html_email') }}</p>
          @endif
        </td>

        <td><label>Kelas</label></td>
				<td>
					<select name="html_kelas">
            @foreach ($data_kelas as $kelas)
              @if($kelas->id == $data_murid->master_kelas_id)
              		<option value="{{ $kelas->id }}" selected>{{ $kelas->kelas}}</option>
              @else
                  <option value="{{ $kelas->id }}">{{ $kelas->kelas}}</option>
              @endif
            @endforeach
					</select>
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_hp') ? 'has-error' : '' }}">
        <td><label>No.Handphone</label></td>
        <td><input class="form-control" type="text" name="html_hp" value="{{ $data_murid->nohandphone }}" >
          @if($errors->has('html_hp'))
            <p class="text-danger">{{ $errors->first('html_hp') }}</p>
          @endif
        </td>

        <td><label>Jabatan</label></td>
        <td>
          <select name="html_jabatan">
            @foreach ($data_jabatan as $jabatan)
            @if($jabatan->id == $data_murid->master_jabatan_id)
            <option value="{{ $jabatan->id }}" selected>{{ $jabatan->nama}}</option>
            @else
            <option value="{{ $jabatan->id }}">{{ $jabatan->nama}}</option>
            @endif
            @endforeach
          </select>
        </td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_tahunmasuk') ? 'has-error' : '' }}">
        <td><label>Tahun Masuk</label></td>
        <td><input class="form-control" type="text" name="html_tahunmasuk" value="{{ $data_murid->tahun_masuk }}" >
          @if($errors->has('html_tahunmasuk'))
            <p class="text-danger">{{ $errors->first('html_tahunmasuk') }}</p>
          @endif
        </td>

        <td><label>Status</label></td>
        <td>
          <select name="html_status">
            @foreach ($data_status as $status)
            @if($status->id == $data_murid->master_status_id)
            <option value="{{ $status->id }}" selected>{{ $status->nama}}</option>
            @else
            <option value="{{ $status->id }}">{{ $status->nama}}</option>
            @endif
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
</div>
@endsection
