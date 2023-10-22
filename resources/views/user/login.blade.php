@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Login
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Login
@endsection

{{--  section container  --}}
@section('container')
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif
	<form method="POST" action="{{ route('authenticate') }}">
		@csrf
		<div class="mb-3">
			<label for="email" class="form-label">Email address</label>
			<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
			@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
			<div id="passwordHelp" class="form-text">Masukkan Passwordmu</div>
			@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
			<button type="submit" class="btn_chat" value="login">Login</button>
			<a href="{{ route('register') }}" class="text-center my-3">
				Dont Have an Account? Register here
			</a>
		</div>
	</form>
@endsection