@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-primary card-header"><b>Edit Data Guru</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/dataguru/'.$data_guru->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group">
      <table class="table" style="width:30%; margin-left:33%; margin-top:-2%;">
      <tr>
        <td>
				<td><label>NIP</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru->noinduk }}" readonly>
        </td>
			</tr>
    </table>
    <table class="table" style="width:75%; margin-left:13%;">
      <tr class="has-feedback{{ $errors->has('html_nama','html_lahir') ? 'has-error' : '' }}">
        <td><label>Nama Lengkap</label></td>
        <td><input class="form-control" type="text" name="html_nama" value="{{ $data_guru->nama }}" >
          @if($errors->has('html_nama'))
            <p class="text-danger">{{ $errors->first('html_nama') }}</p>
          @endif
        </td>

        <td><label>Tanggal Lahir</label></td>
        <td><input class="form-control" type="date" name="html_lahir" value="{{ $data_guru->lahir }}">
          @if($errors->has('html_lahir'))
            <p class="text-danger">{{ $errors->first('html_lahir') }}</p>
          @endif
        </td>
      </tr>
      <tr>
				<td><label>Jenis Kelamin</label></td>
        <td>
          @foreach($data_gander as $gander)
            @if($gander->id == $data_guru->master_gander_id)
              <input type="radio" name="html_gander" value="{{ $gander->id }}" checked>{{ $gander->nama}}
            @else
              <input type="radio" name="html_gander" value="{{ $gander->id }}">{{ $gander->nama}}<br>
            @endif
          @endforeach
        </td>

        <td><label>Agama</label></td>
        <td>
          <select name="html_agama">
            @foreach ($data_agama as $agama)
            @if($agama->id == $data_guru->master_agama_id)
            <option value="{{ $agama->id }}" selected>{{ $agama->nama}}</option>
            @else
            <option value="{{ $agama->id }}">{{ $agama->nama}}</option>
            @endif
            @endforeach
          </select>
        </td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_alamat') ? 'has-error' : '' }}">
        <td><label>Alamat Lengkap</label></td>
        <td><textarea name="html_alamat"  style="width:100%; height:70px;">{{ $data_guru->alamat }}</textarea>
          @if($errors->has('html_alamat'))
            <p class="text-danger">{{ $errors->first('html_alamat') }}</p>
          @endif
        </td>

        <td><label>Kelas Yang Diajar</label></td>
        <td>
          @foreach ($data_kelas as $kelas)
          <?php
          $ch="";
          foreach($data_pengajar as $ajar){
            if($kelas->id == $ajar->master_kelas_id){
              $ch="checked";
              break;
            }
          }
          ?>
          <input type="checkbox" name="chk[]" value="{{ $kelas->id }}" {{ $ch }}>{{ $kelas->kelas}}<br>
          @endforeach
          @if($errors->has('chk'))
              <p class="text-danger">{{ $errors->first('chk') }}</p>
          @endif
        </td>
      </tr>
      <tr class="has-feedback{{ $errors->has('html_email') ? 'has-error' : '' }}">
        <td><label>Email</label></td>
        <td><input class="form-control" type="email" name="html_email" value="{{ $data_guru->email }}" >
          @if($errors->has('html_email'))
            <p class="text-danger">{{ $errors->first('html_email') }}</p>
          @endif
        </td>

        <td><label>Mata Pelajaran</label></td>
        <td>
          <select name="html_mapel">
            <option value="">-- pilih --</option>
            @foreach ($data_mapel as $mapel)

            <?php
            $sl="";
            if($mapel->id == @$data_pengajar[0]->master_mapel_id){
              $sl='selected';
            }
            ?>
            <option value="{{ $mapel->id }}" {{ $sl }}>{{ $mapel->nama}}</option>
            @endforeach
          </select>
        </td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_hp') ? 'has-error' : '' }}">
        <td><label>No.Handphone</label></td>
        <td><input class="form-control" type="text" name="html_hp" value="{{ $data_guru->nohandphone }}" >
          @if($errors->has('html_hp'))
            <p class="text-danger">{{ $errors->first('html_hp') }}</p>
          @endif
        </td>

        <td><label>Status</label></td>
        <td>
          <select name="html_status">
            @foreach ($data_status as $status)
            @if($status->id == $data_guru->master_status_id)
            <option value="{{ $status->id }}" selected>{{ $status->nama}}</option>
            @else
            <option value="{{ $status->id }}">{{ $status->nama}}</option>
            @endif
            @endforeach
          </select>
        </td>
			</tr>
      <tr>
        <!-- <td><label>Jabatan</label></td>
        <td>
        <select name="html_jabatan">
        @foreach ($data_jabatan as $jabatan)
        @if($jabatan->id == $data_guru->master_jabatan_id)
        <option value="{{ $jabatan->id }}" selected>{{ $jabatan->nama}}</option>
        @else
        <option value="{{ $jabatan->id }}">{{ $jabatan->nama}}</option>
        @endif
        @endforeach
      </select>
    </td> -->
			</tr>
    </table><br>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')">Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/dataguru') }}" role="button">Cancel</a>
      </div>
    </div>
  </div>
  </form>
  </div>
</div>
@endsection
