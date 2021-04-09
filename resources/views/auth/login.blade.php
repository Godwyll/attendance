<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | {{ config('app.name') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{ asset('img/favicon.ico') }}">
	
	<link rel="stylesheet" href="{{ asset('libs/bower/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/bower/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/misc-pages.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
	{{-- <div id="back-to-home">
		<a href="{{ route('/') }}" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div> --}}
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="{{ route('/') }}">
				{{-- <span><i class="fa fa-gg"></i></span> --}}
				<span><img src="{{ asset('img/favicon.ico') }}" alt="" height="5"></span>
				<div>{{ config('app.name') }}</div>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Login</h4>
	<form method="POST" action="{{ route('login') }}">
    @csrf
		<div class="form-group">
			<input  placeholder="Username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
			@error('username')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>


		<div class="form-group">
			<input class="form-control" placeholder="Password" name="password"  id="password" type="password">
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror      
		</div>

		<div class="form-group m-b-xl">
			<div class="checkbox checkbox-warning">
				<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
				<label for="remember">Remember Me</label>
			</div>
		</div>
		<input type="submit" class="btn btn-dark" value="LOG IN">
	</form>
</div><!-- #login-form -->

	</div><!-- .simple-page-wrap -->
</body>