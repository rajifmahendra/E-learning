@extends('layouts.homes')

@section('content')
<div class="container"style="margin-bottom:19%;">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Managament Data Mata Pelajaran</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-plus" href="{{ url('/mapel/create') }}" style="border-radius:5px;" role="button"> Tambah Mata Pelajaran</a>
  </p>
  <table class="table text-dark text-center" style="width:70%;margin-left:15%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Kode Mata Pelajaran</td>
      <td>Nama Mata Pelajaran</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php $no = $data_mapel->firstItem(); ?>
    @foreach($data_mapel as $key => $value)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $value->kodemapel }}</td>
      <td>{{ $value->nama }}</td>
      <td>{{ $value->master_status->nama }}</td>
      <td>
        <form action="{{ url('/mapel', $value->id) }}" method="POST">
        <a href="{{ url('/mapel/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary  fa fa-pencil"> Edit</a>
<!--
             @method('DELETE')
             @csrf
             @if($value->master_status_id == 2)
             <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data DIHAPUS?')"><i class=" fa fa-trash"></i> Delete</button>
             @endif -->
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  {!! $data_mapel->links() !!}
</div>
@endsection
