@extends('layouts.homes')

@section('content')
<div class="container">
<div class="card">
  <h1 class="text-primary card-header"><b>Edit Soal Ujian/Tugas</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/soalujian/'.$data_soal->id}}">
    <input type="hidden" name="topik" value="{{ $data_soal->data_ujian->id}}">
    {{ method_field('PATCH') }}
    @csrf
      <h3 class="ml-4"><u>Info Data Topik</u></h3>
    <div class="form-group">
      <table class="table" style="width:90%; margin-left:5%;">
      <tr>
				<td><label>Tipe Ujian</label></td>
            <td><input class="form-control" type="text" name="html_tipe"
              value="{{ $data_soal->data_ujian->master_ujian_tipe->tipe }}" readonly>
        </td>
				<td><label>Nama Guru</label></td>
            <td><input class="form-control" type="text" name="html_nama"
              value="{{ $data_soal->data_ujian->data_pengajar->master_data->nama }}" readonly>
        </td>
  			<td><label>Kelas</label></td>
            <td><input class="form-control" type="text" name="html_kelas"
              value="{{ $data_soal->data_ujian->data_pengajar->master_kelas->kelas }}" readonly>
        </td>
			</tr>
      <tr>
				<td><label>Mata Pelajaran</label></td>
            <td><input class="form-control" type="text" name="html_mapel"
              value="{{$data_soal->data_ujian->data_pengajar->master_mapel->nama }}" readonly>
        </td>
				<td><label>Waktu (Menit)</label></td>
				<td><input class="form-control" type="text" name="html_waktu" value="{{ $data_soal->data_ujian->waktu }} Menit" readonly>
				</td>
			</tr>
    </table>
    </div>
      <h3 class="ml-4"><u>Edit Soal</u></h3><br>
      <div class="form-group">
        <table class="table" style="width:70%; margin-left:15%;">
          <tr class="has-feedback{{ $errors->has('html_pertanyaan') ? 'has-error' : '' }}">
            <td>Pertanyaan</td>
            <td>:</td>
            <td><textarea name="html_pertanyaan" style="width:200%; height:100px;">{{ $data_soal->pertanyaan}}</textarea>
              @if($errors->has('html_pertanyaan'))
                <p class="text-danger">{{ $errors->first('html_pertanyaan') }}</p>
              @endif
            </td>
          </tr>
          <tr class="has-feedback{{ $errors->has('html_a','html_b') ? 'has-error' : '' }}">
            <td>Pilihan A</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="html_a" value="{{ $data_soal->pilihan_a }}">
              @if($errors->has('html_a'))
                <p class="text-danger">{{ $errors->first('html_a') }}</p>
              @endif
            </td>

            <td>Pilihan B</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="html_b" value="{{ $data_soal->pilihan_b }}">
              @if($errors->has('html_b'))
                <p class="text-danger">{{ $errors->first('html_b') }}</p>
              @endif
            </td>
          </tr>
          <tr class="has-feedback{{ $errors->has('html_c','html_d') ? 'has-error' : '' }}">
            <td>Pilihan C</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="html_c" value="{{ $data_soal->pilihan_c }}">
              @if($errors->has('html_c'))
                <p class="text-danger">{{ $errors->first('html_c') }}</p>
              @endif
            </td>

            <td>Pilihan D</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="html_d" value="{{ $data_soal->pilihan_d }}">
              @if($errors->has('html_d'))
                <p class="text-danger">{{ $errors->first('html_d') }}</p>
              @endif
            </td>
          </tr>
          <tr class="has-feedback{{ $errors->has('html_e','html_jawaban') ? 'has-error' : '' }}">
            <td>Pilihan E</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="html_e" value="{{ $data_soal->pilihan_e }}">
              @if($errors->has('html_e'))
                <p class="text-danger">{{ $errors->first('html_e') }}</p>
              @endif
            </td>

            <td><label>Jawaban</label></td>
            <td>:</td>
            <td>
              <select name="html_jawaban">
                  <option value="">-- pilih --</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
              </select>
              @if($errors->has('html_jawaban'))
                <p class="text-danger">{{ $errors->first('html_jawaban') }}</p>
              @endif
            </td>
          </tr>
        </table>
      </div>
      <div class="form-group ml-5">
        <div class="col-sm-offset-2 col-sm-10 mb-5">
          <button type="submit" class="btn btn-primary fa fa-check"
          onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
          <a class="btn btn-warning fa fa-undo" href="{{ url('/soalujian/'.$data_soal->data_ujian->id.'/soal') }}" role="button"> Cancel</a>
        </div>
      </div>
  </form>
</div>
</div>
@endsection
