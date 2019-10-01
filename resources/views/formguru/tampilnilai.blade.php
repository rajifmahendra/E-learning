@extends('layouts.homes')

@section('content')
<script type="text/javascript">
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) {
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
</script>
<div class="container">
<div class="card">
<h1 class="text-primary card-header"><b>Laporan Nilai Murid Kelas</b></h1><br>
<form class="form-horizontal" name="form" id="form" method="POST" action="/nilaimurid_kelas">
  @csrf
  <div class="form-group">
    <table class="table" style="width:20%; margin-left:5%; border-radius:8px;">
      <tr>
        <td>
            <select class="bg-light text-dark" name="jumpMenu" id="jumpMenu">
              @foreach($data_mapel as $mapel)
              <option value="{{ '/nilaimurid_kelas/'.$mapel->id }}">{{ $mapel->nama}}</option><br>
              @endforeach
            </select>
        </td>
        <td><input class="btn btn-success" type="button" name="go_button" id= "go_button" value="GO"
              onclick="MM_jumpMenuGo('jumpMenu','parent',0,)"/></td>
      </tr>
  </table>
    <table class="table bg-dark text-danger" style="width:90%; margin-left:5%; border-radius:8px;">
      <tr>
        @foreach($data_guru as $key => $value)
          <td><label>Mata pelajaran</label></td>
          <td><input class="form-control" type="text" name="html_mapel"
            value="{{ $value->mapel}}" readonly></td>

          <td><label>Guru Pengajar</label></td>
          <td><input class="form-control" type="text" name="html_nik"
            value="{{ $value->guru}}" readonly></td>
        @endforeach
      </tr>
      <tr>
          <td><label>Kelas</label></td>
          <td><input class="form-control" type="text" name="html_mapel"
            value="{{ $wali_murid->kelas}}" readonly></td>

          <td><label>Wali Kelas</label></td>
          <td><input class="form-control" type="text" name="html_kelas"
            value="{{ $wali_murid->master_data->nama}}" readonly></td>
      </tr>
      <tr>

      </tr>
  </table>
</div><br>
<a class="btn btn-success ml-4 fa fa-undo" href="{{ url('/nilaimurid_kelas') }}" role="button"> Close</a>
  <table class="table text-dark text-center" style="width:70%; margin-left:15%;">
    <tr class="bg-dark text-light">
      <td>No</td>
      <td>NIS</td>
      <td>Nama Murid</td>
      <td>Nilai Tugas</td>
      <td>Nilai UTS</td>
      <td>Nilai UAS</td>
      <td>Total</td>
      <td>Status</td>
    </tr>
    @foreach($data_nilai_murid as $key => $value)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$value->noinduk}}</td>
      <td>{{$value->nama}}</td>
      <td>{{$value->tugas}}</td>
      <td>{{$value->uts}}</td>
      <td>{{$value->uas}}</td>
      <td>{{$value->total}}</td>
      @if($value->total)
      <td>{{$value->status_ujian}}</td>
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
