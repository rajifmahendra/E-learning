@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="card-header text-primary"><b>Edit TOPIK Ujian/Tugas</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/dataujian/'.$data_ujian->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <h3 class="ml-4"><u>Info Data Guru</u></h3>
    <div class="form-group">
      <table class="table" style="width:60%; margin-left:20%;">
        <tr>
  				<td><label>NIK</label></td>
            <td><input class="form-control" type="text" name="html_nama" value="{{ $data_ujian->data_pengajar->master_data->noinduk}}" readonly></td>

        <td><label>Nama Guru</label></td>
            <td><input class="form-control" type="text" name="html_nama" value="{{ $data_ujian->data_pengajar->master_data->nama}}" readonly></td>
  			</tr>
        <tr>
  				<td><label>Kelas</label></td>
            <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_ujian->data_pengajar->master_kelas->kelas }}" readonly></td>

  				<td><label>Mata Pelajaran</label></td>
            <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_ujian->data_pengajar->master_mapel->nama }}" readonly></td>
  			</tr>
      </table><br>
      <table class="table" style="width:20%; margin-left:35%;">
    <tr>
      <td><label>Tipe Ujian</label></td>
      <td>
        <select name="html_tipe">
          @foreach ($data_tipe as $tipe)
          @if($tipe->id == $data_ujian->master_ujian_tipe_id)
          <option value="{{ $tipe->id }}" selected>{{ $tipe->tipe}}</option>
          @else
          <option value="{{ $tipe->id }}">{{ $tipe->tipe}}</option>
          @endif
          @endforeach
        </select>
      </td>
    </tr>
    <tr class="has-feedback{{ $errors->has('html_waktu') ? 'has-error' : '' }}">
			<td><label>Waktu (Menit)</label></td>
			<td><input class="form-control" type="text" name="html_waktu" value="{{ $data_ujian->waktu }}" >
        @if($errors->has('html_waktu'))
          <p class="text-danger">{{ $errors->first('html_waktu') }}</p>
        @endif
      </td>
		</tr>
    <tr class="has-feedback{{ $errors->has('html_keterangan') ? 'has-error' : '' }}">
			<td><label>Keterangan</label></td>
			<td><textarea name="html_keterangan" >{{ $data_ujian->keterangan }}</textarea>
        @if($errors->has('html_keterangan'))
          <p class="text-danger">{{ $errors->first('html_keterangan') }}</p>
        @endif
      </td>
		</tr>
    <tr>
			<td><label>Status</label></td>
			<td>
				<select name="html_status">
          @foreach ($data_status as $status)
            @if($status->id == $data_ujian->master_status_id)
                <option value="{{ $status->id }}" selected>{{ $status->nama}}</option>
            @else
                  <option value="{{ $status->id }}">{{ $status->nama}}</option>
            @endif
          @endforeach
				</select>
			</td>
		</tr>

    </table>
    </div>
    <div class="form-group ml-5">
      <div class="col-sm-offset-2 col-sm-10 mb-4">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/dataujian') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
