@extends('layouts.homes')

@section('content')
<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Managament Data Guru</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-user-plus" href="{{ url('/dataguru/create') }}" style="border-radius:5px;" role="button"> Tambah Data Guru</a>

    <a href="#" onclick="window.open('/guru/print', 'liveMatches','width=720,height=800,toolbar=0,location=0, directories=0, status=0,location=no,menubar=0')"
     class="btn btn-primary fa fa-print" target="_blank" style="border-radius:5px;" role="button"> CETAK</a>

    <form class="form-inline" style="margin-left:70%; margin-top:-55px;" action="/searchguru" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ old('search') }}">
        <button class="btn btn-outline-dark my-2 my-sm-0 fa fa-search" style="border-radius:10px; background-color:lightgreen; border:none;"
        type="submit">Search</button>
    </form>
  </p>
  <table class="table text-dark text-center" style="margin-bottom:-0.5%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIP</td>
      <td>Nama</td>
      <td>JenisKelamin</td>
      <td>Agama</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php $no = $data_guru->firstItem(); ?>
    @foreach($data_guru as $key => $value)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $value->noinduk }}</td>
      <td>{{ $value->nama }}</td>
      <td>{{ $value->master_gander->nama }}</td>
      <td>{{ $value->master_agama->nama }}</td>
      <td>{{ $value->master_status->nama }}</td>
      <td>
        <form action="{{ url('/dataguru', $value->id) }}" method="POST">
        <a href="{{ url('/dataguru/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary fa fa-pencil"> Edit</a>
             @method('DELETE')
             @csrf

             <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data DIHAPUS?')"><i class="fa fa-trash"></i> Delete</button>
        </form>
        <a href="{{ url('/dataguru/'.$value->id )}}" class="btn btn-sm btn-warning mt-1 fa fa-user"> Profile</a>
        <a href="{{ url('/dataguru/'.$value->id.'/resetpassword')}}" class="btn btn-sm btn-primary fa fa-repeat"> Reset Password</a>
      </td>
    </tr>
    @endforeach
  </table>
  {!! $data_guru->links() !!}
</div>
@endsection
