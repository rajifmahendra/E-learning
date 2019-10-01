@extends('layouts.homes')

@section('content')
<div class="container">
  <h1 class="text-primary mt-3"><b>Daftar Soal Ujian/Tugas</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/soalujian/{id}/soal'}}">
    @csrf
      <h3 class="ml-4"><u>Info Data Topik</u></h3><br>
    <div class="form-group">
    <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
      <tr>
				<td><label>Tipe Ujian</label></td>
              <td><input class="form-control" type="text" name="html_tipe" value="{{ $data_ujian->master_ujian_tipe->tipe }}" readonly>
              </td>
				<td><label>Nama Guru</label></td>
              <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_ujian->data_pengajar->master_data->nama }}" readonly>
              </td>
  			<td><label>Kelas</label></td>
              <td><input class="form-control" type="text" name="html_kelas" value="{{ $data_ujian->data_pengajar->master_kelas->kelas }}" readonly>
              </td>
			</tr>
      <tr>
				<td><label>Mata Pelajaran</label></td>
              <td><input class="form-control" type="text" name="html_mapel" value="{{ $data_ujian->data_pengajar->master_mapel->nama }}" readonly>
              </td>
				<td><label>Waktu (Menit)</label></td>
      				<td><input class="form-control" type="text" name="html_waktu" value="{{ $data_ujian->waktu }} Menit" readonly>
      				</td>
			</tr>
    </table>
    </div>
      <a class="btn btn-success fa fa-undo" href="{{ url('/dataujian') }}" role="button"> Back</a>
      <a href="#" onclick="window.open('/soal/print/{{$data_ujian->id}}', 'liveMatches', 'width=720,height=800,toolbar=0,location=0, directories=0, status=0,location=no,menubar=0')"
       class="btn btn-primary fa fa-print" target="_blank" style="border-radius:5px;" role="button"> CETAK Soal</a><br><br>
      @if(count($data_soal)>=1)
  <div class="form-group">
    <table class="table text-dark text-center" style="width:110%; margin-left:-5%;">
      <tr class="bg-dark text-light">
        <td>No</td>
        <td>Pertanyaan</td>
        <td>Pilihan A</td>
        <td>Pilihan B</td>
        <td>Pilihan C</td>
        <td>Pilihan D</td>
        <td>Pilihan E</td>
        <td>Jawaban</td>
        <td>Action</td>
      </tr>
      <?php $no = $data_soal->firstItem(); ?>
      @foreach($data_soal as $key => $value)
      <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $value->pertanyaan}}</td>
        <td>{{ $value->pilihan_a}}</td>
        <td>{{ $value->pilihan_b}}</td>
        <td>{{ $value->pilihan_c}}</td>
        <td>{{ $value->pilihan_d}}</td>
        <td>{{ $value->pilihan_e}}</td>
        <td>{{ $value->jawaban}}</td>
        <td>
          <form action="{{ url('/soalujian', $value->id) }}" method="POST">
            <a href="{{ url('/soalujian/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary fa fa-pencil"> Edit</a>

                 @method('DELETE')
                 @csrf
           <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data DIHAPUS?')"><i class="fa fa-trash"></i> Delete</button><Br>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
      {!! $data_soal->links() !!}
  </div>
  @else
  <h3 class="text-center">Data Masih Kosong</h3>
  @endif
  </form>
</div>
@endsection
