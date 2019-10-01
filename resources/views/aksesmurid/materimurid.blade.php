@extends('layouts.homemurid')

@section('content')
<div class="container mt-5">
  <h1 class="text-primary card-header bg-secondary"><b>Materi</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/mapelmateri/{id}') }}">
    @csrf
    <h3 class="ml-4"><u>Info Data Murid</u></h3><br>
    <div>
    <table class="table bg-dark text-danger" style="width:85%; margin-left:8%; border-radius:8px;">
      <tr>
				<td><label>NIS</label></td>
					<td><input class="form-control" type="text" name="html_nik" value="{{ $data_murid->noinduk }}" readonly></td>

				<td><label>Nama Lengkap</label></td>
          <td><input class="form-control" type="text" name="html_nama" value="{{ $data_murid->nama}}" readonly></td>

          <td><label>Jenis Kelamin</label></td>
          <td><input class="form-control" type="text" name="html_thnmasuk" value="{{ $data_murid->master_gander->nama }}" readonly></td>
			</tr>
      <tr>
				<td><label>Kelas</label></td>
          <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_murid->master_kelas->kelas}}" readonly></td>

				<td><label>Tgl.Lahir</label></td>
          <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_murid->lahir }}" readonly></td>

          <td><label>Email</label></td>
          <td><input class="form-control" type="text" name="html_email" value="{{ $data_murid->email}}" readonly></td>
			</tr>
    </table>
    </div>
    <a class="btn btn-success ml-5 mb-3 fa fa-undo" href="{{ url('/materimurid') }}" role="button"> Back</a>
      <div class="form-group">
        @if(count($data_materi)>=1)
        <table class="table text-light text-center" style="border-radius:13px; width:70%;margin-left:13%;">
          <tr class="bg-secondary text-light">
            <td>No</td>
            <td>Nama Guru</td>
            <td>Mata Pelajaran</td>
            <td>Judul Materi</td>
            <td>Catatan Materi</td>
            <td>Action</td>
          </tr>
          @foreach($data_materi as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->data_pengajar->master_data->nama }}</td>
            <td>{{ $value->data_pengajar->master_mapel->nama }}</td>
            <td>{{ $value->subject}}</td>
            <td>{{ $value->catatan}}</td>
            <td>
                <a href="{{ asset('/materi/'.$value->path.'/'.$value->filename) }}" class="btn btn-sm btn-primary fa fa-download"> Download</a>
            </td>
          </tr>
          @endforeach
        </table><br>
        @else
        <h3 class="text-center text-danger mt-5">Data Belum Tersedia</h3>
        @endif
      </div>
  </form>
  </div>
</div>
@endsection
