@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-primary card-header"><b>Tambah TOPIK Ujian/Tugas</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/dataujian')}}">
    <input type="hidden" value="{{ $data_pengajar->id }}" name="data_pengajar_id">
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
    <h3 class="ml-4"><u>Data Topik Ujian/Tugas</u></h3>
<div class="form-group row">
  <table style="margin-left:30%;">
    <tr>
        <td><label>Tipe</label></td>
        <td>:</td>
        <td>
          <select name="html_tipe">
              <option value="">-- pilih --</option>
            @foreach($data_tipe as $tipe)
                 <option value="{{ $tipe->id }}">{{ $tipe->tipe}}</option><br>
            @endforeach
          </select>
        </td>
    <tr>
    <tr class="has-feedback{{ $errors->has('html_waktu') ? 'has-error' : '' }}">
      <td>Waktu (Menit)</td>
      <td>:</td>
      <td><input class="form-control" type="text" name="html_waktu"
                  placeholder="Hanya Angka Saja" value="{{old('html_waktu')}}">
          @if($errors->has('html_waktu'))
            <p class="text-danger">{{ $errors->first('html_waktu') }}</p>
          @endif
      </td>
    </tr>
    <tr class="has-feedback{{ $errors->has('html_keterangan') ? 'has-error' : '' }}">
      <td>Keterangan</td>
      <td>:</td>
      <td><textarea name="html_keterangan" placeholder="Keterangan" >{{old('html_keterangan')}}</textarea>
        @if($errors->has('html_keterangan'))
          <p class="text-danger">{{ $errors->first('html_keterangan') }}</p>
        @endif
      </td>
    </tr>
  </table>
</div>
    <div class="form-group ml-5">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/cari/guru/tampil') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
