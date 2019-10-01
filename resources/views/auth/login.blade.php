<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

		<title>E-Learning</title>
    <link rel="shortcut icon" href="css/images/logomabal.png">
		<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
	@if (session('status'))
			<div class="alert alert-success">
					{{ session('status') }}
			</div>
	@endif
  <form method="POST" action="{{ route('login') }}">
    @csrf
		<img src="css/images/logomabal.png" class="mabal"/>
	<div id="wrap">
		<div id="header">
			<img src="css/images/logoe.png" class="logoelearning"/>
			<ul>
				<h1>Silahkan Login</h1>
			</ul>
			<table>
				@error('noinduk')
				<span class="invalid-feedback" role="alert">
					<strong><h2 style="color:red;">{{ $message }}</h2></strong>
				</span>
				@enderror
				<tr>
					<td class="email">{{ __('Username') }}</td>
          <td><input type="text" name="noinduk" value="{{ old('noinduk') }}" placeholder="Username"required autocomplete="noinduk" autofocus><br>
					</td>
				</tr>
					<td>{{ __('Password') }}</td>
          <td><input type="password" name="password" placeholder="Password" required autocomplete="current-password"><br>
					</td>
				<tr>
					<td></td>
					<td><input type="submit" value="Login"></td>
				</tr>
			</table>
			<div class="">
				<img src="css/images/kartunbaca.png" class="kartun"/>
			</div>
		</div>
	</div>
</body>
</html>
