@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Register
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Register
@endsection

{{--  section container  --}}
@section('container')
	<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="name" class="form-label">Name</label>
			<input type="text" class="form-control @error('name') is invalid @enderror" id="name" name="name" value="{{ old('name') }}">
			@if ($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email address</label>
			<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We will never share your email with anyone</div>
			@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
			<div id="passwordHelp" class="form-text">Masukkan minimal 8 karakter yang unik</div>
			@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="password_confirmation" class="form-label">Password Confirm</label>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
		</div>
			<div class="mb-5">
				<label for="photo" class="form-label">Photo</label>
				<input type="file" class="form-control" id="" name="photo" value="">
				@if ($errors->has('photo'))
					<span class="text-danger">{{ $errors->first('photo') }}</span>
				@endif
			</div>
		<div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
			<button type="submit" class="btn_chat" value="register">Register</button>
			<a href="/login" class="text-center my-3">
				Have an Account? Login here
			</a>
		</div>
	</form>
@endsection