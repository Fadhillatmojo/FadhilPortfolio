@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Edit User
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Edit User
@endsection

{{--  section container  --}}
@section('container')
	@if ($message = Session::get('message'))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif
	<h3>Photo Profile</h3>
	<img src="{{ asset('storage/photos/'.$user->photo) }}" width="300" class="mb-5" alt="{{ $user->name }}">
	<form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label for="name" class="form-label">Name</label>
			<input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
			@if ($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
			@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="mb-5">
			<label for="photo" class="form-label">Photo</label>
			<input type="file" class="form-control" id="" name="photo" value="">
			@if ($errors->has('photo'))
				<span class="text-danger">{{ $errors->first('photo') }}</span>
			@endif
		</div>
		<div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
			<button type="submit" class="btn_chat btn btn-primary" value="update">Update</button>
			<a href="{{ route('user.index') }}" class=" btn btn-danger text-center my-3">
				Cancel
			</a>
		</div>
	</form>
@endsection