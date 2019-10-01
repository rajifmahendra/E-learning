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
            <select class="bg-light text-dark dropdown-toggle" name="jumpMenu" id="jumpMenu">
              @foreach($data_mapel as $mapel)
              <option value="{{ '/nilaimurid_kelas/'.$mapel->id }}">{{ $mapel->nama}}</option><br>
              @endforeach
            </select>
        </td>
        <td><input class="btn btn-success" type="button" name="go_button" id= "go_button" value="GO"
              onclick="MM_jumpMenuGo('jumpMenu','parent',0,)"/></td>
      </tr>
  </table>
</div><br>
</form>
</div>
</div>
@endsection
