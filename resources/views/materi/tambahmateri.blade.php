@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:10%;">
<div class="card">
  <h1 class="text-primary card-header"><b>Tambah materi</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/datamateri')}}" enctype="multipart/form-data">
    <input type="hidden" value="{{ $data_pengajar->id }}" name="data_pengajar">
    @csrf
    <h3 class="ml-4"><u>Info Data Guru</u></h3>
    <div class="form-group">
    <table class="table bg-dark text-danger" style="width:60%; margin-left:18%; border-radius:8px;">
      <tr>
				<td><label>NIK</label></td>
					<td><input class="form-control" type="text" name="html_nik" value="{{ $data_pengajar->master_data->noinduk }}" readonly></td>
				<td><label>Nama Guru</label></td>
          <td><input class="form-control" type="text" name="html_nama" value="{{ $data_pengajar->master_data->nama}}" readonly></td>
			</tr>
      <tr>
				<td><label>Kelas</label></td>
          <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_pengajar->master_kelas->kelas }}" readonly></td>
				<td><label>Mata Pelajaran</label></td>
          <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_pengajar->master_mapel->nama }}" readonly></td>
			</tr>

    </table>
  </div><br>
    <h3 class="ml-4"><u>Data Materi</u></h3>
<div class="form-group row">
  <table style="margin-left:30%;">
    <tr class="has-feedback{{ $errors->has('html_judul') ? 'has-error' : '' }}">
        <td><label>Judul</label></td>
        <td>:</td>
        <td><input class="form-control" type="text" name="html_judul" placeholder="Judul" >
          @if($errors->has('html_judul'))
            <p class="text-danger">{{ $errors->first('html_judul') }}</p>
          @endif
        </td>
    <tr>
    <tr class="has-feedback{{ $errors->has('filename') ? 'has-error' : '' }}">
      <td>File</td>
      <td>:</td>
      <td><input class="form-control" type="file" name="filename">
        @if($errors->has('filename'))
          <p class="text-danger">{{ $errors->first('filename') }}</p>
        @endif
      </td>
    </tr>
    <tr class="has-feedback{{ $errors->has('html_catatan') ? 'has-error' : '' }}">
      <td>Catatan</td>
      <td>:</td>
      <td><input class="form-control" type="text" name="html_catatan" placeholder="Catatan" >
        @if($errors->has('html_catatan'))
          <p class="text-danger">{{ $errors->first('html_catatan') }}</p>
        @endif
      </td>
    </tr>
  </table>
</div>
    <div class="form-group ml-5">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/cari/dataguru/tampil') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
