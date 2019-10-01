@extends('layouts.homes')

@section('content')
<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="text-primary"><b>Managament Data Ujian</b></h1><br>
  <p>
    <a class="btn btn-success fa fa-plus" href="{{ url('/cari/guru/tampil') }}" style="border-radius:5px;" role="button"> Tambah Topik Ujian</a>
    <form class="form-inline" style="margin-left:70%; margin-top:-55px;" action="/searchtopik" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ old('search') }}">
        <button class="btn btn-outline-dark my-2 my-sm-0 fa fa-search" style="border-radius:10px; background-color:lightgreen; border:none;"
        type="submit">Search</button>
    </form>
  </p>
    @if(count($data_ujian_guru)>=1)
  <table class="table text-dark text-center">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>Nama Guru</td>
      <td>Tipe</td>
      <td>kelas</td>
      <td>Mata Pelajaran</td>
      <td>Tgl.Pembuatan</td>
      <td>Waktu<br/>(Menit)</td>
      <td>Keterangan</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php $no = $data_ujian_guru->firstItem(); ?>
    @foreach($data_ujian_guru as $key => $value)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $value->nama_guru}}</td>
      <td>{{ $value->tipe}}</td>
      <td>{{ $value->kelas}}</td>
      <td>{{ $value->nama_pelajaran }}</td>
      <td>{{ $value->created_at }}</td>
      <td>{{ $value->waktu }} Menit</td>
      <td>{{ $value->keterangan }}</td>
      <td>{{ $value->status }}</td>
      <td>
        <form action="{{ url('/dataujian', $value->id) }}" method="POST">
          <a href="{{ url('/dataujian/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary fa fa-pencil"> Edit</a>

               @method('DELETE')
               @csrf
               @if($value->status == 'Non Aktif')
               <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data DIHAPUS?')"><i class="fa fa-trash"></i> Delete</button><Br>
              @endif
        </form>
           <a href="{{ url('/soalujian/'.$value->id.'/create')}}" class="btn btn-sm btn-success mt-1 fa fa-plus-circle"> Buat Soal</a>
           <a href="{{ url('/soalujian/'.$value->id.'/soal')}}" class="btn btn-sm btn-warning fa fa-search"> Lihat Soal</a>
           <a href="{{ url('/tampilnilai/'.$value->id)}}" class="btn btn-sm btn-warning fa fa-history"> Check Peserta</a>
      </td>
    </tr>
    @endforeach
  </table>
{!! $data_ujian_guru->links() !!}
@else
<h3 class="text-center">Data Masih Kosong</h3>
@endif
</div>
@endsection
