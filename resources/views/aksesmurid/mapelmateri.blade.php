@extends('layouts.homemurid')

@section('content')
<div class="container mt-5">
  <h1 class="text-primary card-header bg-secondary"><b>Materi</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/datasoal')}}">
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
    <h3 class="card-header"><u>Pilih Mata Pelajaran</u></h3><br>
    <table class="table text-light text-center" style="border-radius:13px; width:60%;margin-left:18%;">
      <tr class="bg-secondary text-light">
        <td>No</td>
        <td>Nama Guru</td>
        <td>Mata Pelajaran</td>
        <td>Action</td>
      </tr>
      @foreach($data_pengajar as $key => $value)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $value->master_data->nama}}</td>
        <td>{{ $value->master_mapel->nama}}</td>
        <td>
            <a href="{{ url('/materimurid/'.$value->id)}}" class="btn btn-sm btn-primary fa fa-search-plus"> Lihat Materi</a>
        </td>
      </tr>
      @endforeach
    </table>
  </form>
</div>
@endsection
