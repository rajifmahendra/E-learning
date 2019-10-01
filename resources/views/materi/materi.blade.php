@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:10%;">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Managament Data Materi</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-plus" href="{{ url('/cari/dataguru/tampil') }}" style="border-radius:5px;" role="button"> Tambah Materi</a>
    <form class="form-inline" style="margin-left:70%; margin-top:-55px;" action="/searchmateri" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ old('search') }}">
        <button class="btn btn-outline-dark my-2 my-sm-0 fa fa-search" style="border-radius:10px; background-color:lightgreen; border:none;"
        type="submit">Search</button>
    </form>
  </p>
  @if(count($data_materi)>=1)
  <table class="table text-dark text-center">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Nama Guru</td>
      <td>kelas</td>
      <td>Mata Pelajaran</td>
      <td>Tgl.Pembuatan</td>
      <td>Judul</td>
      <td>Filename</td>
      <td>Catatan</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php $no = $data_materi->firstItem(); ?>
    @foreach($data_materi as $key => $value)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $value->nama_guru}}</td>
      <td>{{ $value->kelas}}</td>
      <td>{{ $value->nama_pelajaran}}</td>
      <td>{{ $value->created_at }}</td>
      <td>{{ $value->subject }}</td>
      <td>{{ $value->filename }}</td>
      <td>{{ $value->catatan }}</td>
      <td>{{ $value->status }}</td>
      <td>
          <a href="{{ url('/datamateri/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary fa fa-pencil"> Edit</a><br/><br/>
          <a href="{{ asset('/materi/'.$value->path.'/'.$value->filename) }}" class="text-danger fa fa-download">Download</a>
      </td>
    </tr>
    @endforeach
  </table>
  {!! $data_materi->links() !!}
  @else
  <h3 class="text-center">Data Masih Kosong</h3>
  @endif
</div>
@endsection
