<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-learning</title>
    <link rel="shortcut icon" href="{{ asset('css/images/logomabal.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div>
  <h1 onclick="window.print()" class="text-primary text-center mt-5"><b>Data Guru</b></h1><br>
<img src="{{ asset('css/images/logomabal.png') }}" height="10%" width="10%" style="margin-top:-13%;margin-left:5%;">
</div>
<table class='table table-bordered text-center ml-5 mr-5' style="width:89%;">
	<tr class="bg-dark text-light">
		<td>No</td>
		<td>NIP</td>
		<td>Nama</td>
		<td>JenisKelamin</td>
		<td>Agama</td>
		<td>Jabatan</td>
	</tr>
	@php $no=1 @endphp
	@foreach($data_guru as $key => $value)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $value->noinduk }}</td>
		<td>{{ $value->nama }}</td>
		<td>{{ $value->master_gander->nama }}</td>
		<td>{{ $value->master_agama->nama }}</td>
		<td>{{ $value->master_jabatan->nama }}</td>
  <tr>
    @endforeach
</table>
</body>
</html>
