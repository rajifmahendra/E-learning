@extends('layouts.homes')

@section('content')
<div class="container" style="margin-bottom:22%;">
<div class="card">
  <h1 class="text-primary card-header"><b>Edit Data Mata Pelajaran</b></h1><br>
  <form class="form-horizontal" method="POST" action="{{'/mapel/'.$data_mapel->id}}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="form-group row">
      <table class="table" style="width:40%; margin-left:20%; margin-top:-2%;">
      <tr>
				<td><label>Kode Mata Pelajaran</label></td>
        <td><input class="form-control" type="text" value="{{ $data_mapel->kodemapel }}"readonly>
			</tr>
      <tr class="has-feedback{{ $errors->has('html_nama') ? 'has-error' : '' }}">
				<td><label>Nama Mata Pelajaran</label></td>
				<td><input class="form-control" type="text" name="html_nama"
                    placeholder="Nama Mata Pelajaran" value="{{$data_mapel->nama}}">
          @if($errors->has('html_nama'))
            <p class="text-danger">{{ $errors->first('html_nama') }}</p>
          @endif
				</td>
			</tr>
      <tr>
				<td><label>Status</label></td>
				<td>
					<select name="html_status">
            @foreach ($data_status as $status)
              @if($status->id == $data_mapel->master_status_id)
                  <option value="{{ $status->id }}" selected>{{ $status->nama}}</option>
              @else
                    <option value="{{ $status->id }}">{{ $status->nama}}</option>
              @endif
            @endforeach
					</select>
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
