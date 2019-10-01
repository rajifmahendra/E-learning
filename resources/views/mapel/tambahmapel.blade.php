@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:27%;">
<div class="card">
  <h1 class="text-primary card-header"><b>Tambah Data Mata Pelajaran</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/mapel') }}">
    @csrf
    <div class="form-group">
      <table class="table" style="width:40%; margin-left:20%; margin-top:-2%;">
      <tr class="has-feedback{{ $errors->has('html_kodemapel') ? 'has-error' : '' }}">
				<td><label>Kode Mata Pelajaran</label></td>
				<td><input class="form-control" type="text" name="html_kodemapel"
                  placeholder="Kode Mapel" value="{{old('html_kodemapel')}}">
        @if($errors->has('html_kodemapel'))
          <p class="text-danger">{{ $errors->first('html_kodemapel') }}</p>
        @endif
				</td>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_nama') ? 'has-error' : '' }}">
				<td><label>Nama Mata Pelajaran</label></td>
				<td><input class="form-control" type="text" name="html_nama"
                    placeholder="Nama Mata Pelajaran" value="{{old('html_nama')}}">
          @if($errors->has('html_nama'))
            <p class="text-danger">{{ $errors->first('html_nama') }}</p>
          @endif
				</td>
			</tr>

    </table>
    </div>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/mapel') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
