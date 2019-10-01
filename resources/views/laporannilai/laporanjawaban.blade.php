@extends('layouts.homes')

@section('content')
<div class="container">
    @csrf
    <h1 class="text-primary"><b>Info Data Jawaban Murid</b></h1><br>
    <p>
      <a class="btn btn-success ml-4 fa fa-undo" href="{{ url('/laporannilai/'.$ujian_murid->data_ujian->data_pengajar->id) }}" role="button"> Back</a>
    </p>
  <form class="form-horizontal" method="POST" action="{{ url('/laporanjawaban/{id}') }}">
    <table class="table bg-dark text-danger" style="width:85%; margin-left:8%; border-radius:8px;">
      <tr>
        <td><label>Nama Murid</label></td>
          <td><input class="form-control" type="text" name="html_nik" value="{{ $ujian_murid->master_data->nama }}" readonly></td>

        <td><label>Tgl. Pengerjaan</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $ujian_murid->created_at}}" readonly></td>

        <td><label>Tipe Soal</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $ujian_murid->data_ujian->master_ujian_tipe->tipe}}" readonly></td>
      </tr>
      <tr>
        <td><label>Kelas</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $ujian_murid->data_ujian->data_pengajar->master_kelas->kelas}}" readonly></td>

        <td><label>Mata Pelajaran</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $ujian_murid->data_ujian->data_pengajar->master_mapel->nama}}" readonly></td>

        <td><label>Nilai</label></td>
        <td><input class="form-control" type="text" name="html_nik" value="{{ $data_siswa_ujian[0]->nilai}}" readonly></td>
      </tr>
    </table>
  <table class="table text-dark" style="border-radius:13px; width:60%;margin-left:18%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Soal</td>
      <td>Info</td>
    </tr>
    @foreach($ujian_murid_detail as $key => $value)
    <tr>
      <td>{{ $key+1 }}.</td>
      <td>{{ $value->soal_ujian->pertanyaan }}<br><br>
          A. {{ $value->soal_ujian->pilihan_a }}<br>
          B. {{ $value->soal_ujian->pilihan_b }}<br>
          C. {{ $value->soal_ujian->pilihan_c }}<br>
          D. {{ $value->soal_ujian->pilihan_d }}<br>
          E. {{ $value->soal_ujian->pilihan_e }}<br>
      </td>
      <td>
          Jawaban Benar : {{ $value->soal_ujian->jawaban }}<br>
          Jawaban Murid : {{ $value->jawaban }}<br>
          Nilai : {{ $value->nilai_benar_persoal }}
      </td>
    </tr>
    @endforeach
  </table><br>
  </form>
</div>
@endsection
