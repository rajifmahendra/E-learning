@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:24%;">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Daftar Murid Kelas</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-undo" href="{{ url('/datapengajar') }}" role="button"> Back</a>
    <form class="form-inline" style="margin-left:70%; margin-top:-55px;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0 fa fa-search" style="border-radius:10px; background-color:lightgreen; border:none;" type="submit"> Search</button>
    </form>
  </p>
  <table class="table btext-dark text-center" >
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIP</td>
      <td>Nama</td>
      <td>JenisKelamin</td>
      <td>Kelas</td>
      <td>Agama</td>
    </tr>
    <?php $no = $data_murid->firstItem(); ?>
    @foreach($data_murid as $key => $value)
    <tr>
      <td>{{ $no++}}</td>
      <td>{{ $value->noinduk }}</td>
      <td>{{ $value->nama }}</td>
      <td>{{ $value->master_gander->nama }}</td>
      <td>{{ $value->master_kelas->kelas }}</td>
      <td>{{ $value->master_agama->nama }}</td>
    </tr>
    @endforeach
  </table>
  {!! $data_murid->links() !!}
</div>
@endsection
