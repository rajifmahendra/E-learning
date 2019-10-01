@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:9%;">
<div class="card">
  <h1 class="text-primary card-header"><b>Laporan Nilai Murid</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('laporannilai/{id}') }}">
    @csrf
    <div class="form-group">
      <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
        <tr>
            <td><label>Nama Guru</label></td>
            <td><input class="form-control" type="text" name="html_nama" value="{{ $data_pengajar->master_data->nama}}" readonly></td>

            <td><label>Mata Pelajaran</label></td>
            <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_pengajar->master_mapel->nama }}" readonly></td>
  			</tr>
        <tr>
  				  <td><label>Kelas</label></td>
            <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_pengajar->master_kelas->kelas }}" readonly></td>

            <td><label>Wali Kelas</label></td>
            <td><input class="form-control" type="text" name="html_nik" value="{{ $data_pengajar->master_kelas->master_data->nama }}" readonly></td>
  			</tr>
    </table>
    </div>
    <a class="btn btn-success ml-4 fa fa-undo" href="{{ url('/laporannilai/cari') }}" role="button"> Back</a>
    <a href="#" onclick="window.open('/print/{{$data_pengajar->id}}', 'liveMatches', 'width=720,height=800,toolbar=0,location=0, directories=0, status=0,location=no,menubar=0')"
     class="btn btn-primary fa fa-print" target="_blank" style="border-radius:5px;" role="button"> CETAK Laporan</a>
    <table class="table text-dark text-center" style="width:70%; margin-left:15%;">
      <tr class="bg-dark text-light">
        <td>No</td>
        <td>Nama Murid</td>
        <td href="">40%<br/>Tugas</td>
        <td href="">30%<br/>UTS</td>
        <td href="">30%<br/>UAS</td>
        <td>Total</td>
        <td>Status</td>
      </tr>
      @foreach($nilai_murid as $key => $value)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $value->nama }}</td>
        <td><a href="{{ asset('/laporanjawaban/'.$value->idtugas) }}">{{ $value->tugas }}</a></td>
        <td><a href="{{ asset('/laporanjawaban/'.$value->iduts) }}">{{ $value->uts }}</a></td>
        <td><a href="{{ asset('/laporanjawaban/'.$value->iduas) }}">{{ $value->uas }}</a></td>
        <td>{{ $value->total }}</td>
        @if($value->total)
        <td>{{ $value->status_ujian }}</td>
        @else
        <td></td>
        @endif
      </tr>
      @endforeach
    </table>
  </form>
  </div>
</div>
@endsection
