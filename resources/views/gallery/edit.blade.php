@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Edit gallery
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Edit gallery
@endsection

{{--  section container  --}}
@section('container')
	@if ($message = Session::get('message'))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif
	<img src="{{ asset('storage/posts_image/'.$gallery->picture) }}" width="300" class="mb-5" alt="{{ $gallery->name }}">
	<form method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="title" class="form-control" id="title" name="title" value="{{ $gallery->title }}">
			@if ($errors->has('title'))
				<span class="text-danger">{{ $errors->first('title') }}</span>
			@endif
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Description</label>
			<textarea type="description" class="form-control" id="description" name="description">{{ $gallery->description }}</textarea>
			@if ($errors->has('description'))
				<span class="text-danger">{{ $errors->first('description') }}</span>
			@endif
		</div>
		<div class="mb-5">
			<label for="picture" class="form-label">picture</label>
			<input type="file" class="form-control" id="" name="picture">
			@if ($errors->has('picture'))
				<span class="text-danger">{{ $errors->first('picture') }}</span>
			@endif
		</div>
		<div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
			<button type="submit" class="btn_chat btn-primary" value="update">Update</button>
			<a href="{{ route('gallery.index') }}" class=" btn btn-danger text-center my-3">
				Cancel
			</a>
		</div>
	</form>
@endsection