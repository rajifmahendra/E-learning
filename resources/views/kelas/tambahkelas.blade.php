@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:28%;">
<div class="card">
  <h1 class="text-primary card-header"><b>Tambah Data Kelas</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{ url('/kelas') }}">
    @csrf
    <div class="form-group">
      <table class="table" style="width:40%; margin-left:20%; margin-top:-2%;">
      <tr class="has-feedback{{ $errors->has('html_kelas') ? 'has-error' : '' }}">
				<td><label>Kelas</label></td>
				<td><input class="form-control" type="text" name="html_kelas" placeholder="Kelas" >
          @if($errors->has('html_kelas'))
                <p class="text-danger">{{ $errors->first('html_kelas') }}</p>
          @endif
				</td>
			</tr>
      <tr>
				<td><label>Nama Wali Kelas</label></td>
				<td>
					<select name="html_walikelas">
            @foreach ($data_walikelas as $value)
              		<option value="{{ $value->id }}">{{ $value->nama}}</option>
            @endforeach
					</select>
				</td>
			</tr>

    </table>
    </div>
    <div class="form-group ml-4">
      <div class="col-sm-offset-2 col-sm-10 mb-3">
        <button type="submit" class="btn btn-primary fa fa-check" onclick="return confirm('Apakah Anda yakin dengan Data Anda?')"> Submit</button>
        <a class="btn btn-warning fa fa-undo" href="{{ url('/kelas') }}" role="button"> Cancel</a>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
