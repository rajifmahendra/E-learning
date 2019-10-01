@extends('layouts.homes')

@section('content')
<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Managament Data Kelas</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-plus" href="{{ url('/kelas/create') }}" style="border-radius:5px;" role="button"> Tambah Data Kelas</a>
  </p>
  <table class="table text-dark text-center" style="width:70%;margin-left:15%;margin-bottom:20%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Kelas</td>
      <td>Wali Kelas</td>
      <td>Action</td>
    </tr>
    @foreach($data_kelas as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ $value->kelas }}</td>
      <td>{{ $value->walikelas }}</td>
      <td>
        <form action="{{ url('/kelas', $value->id) }}" method="POST">
        <a href="{{ url('/kelas/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary fa fa-pencil"> Edit</a>

             <!-- @method('DELETE')
             @csrf
             <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data DIHAPUS?')"><i class="fa fa-trash"></i> Delete</button> -->
        </form>
        <a href="{{ url('/kelas/'.$value->id )}}" class="btn btn-sm btn-warning mt-1 fa fa-search"> Lihat Murid</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
