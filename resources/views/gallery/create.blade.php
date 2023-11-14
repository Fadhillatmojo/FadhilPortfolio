@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Create Gallery
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Create gallery
@endsection

{{--  section container  --}}
@section('container')
<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="mb-3">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" id="title" name="title">
		@if ($errors->has('title'))
			<span class="text-danger">{{ $errors->first('title') }}</span>
		@endif
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">
			Description
		</label>
		<textarea class="form-control" id="description" rows="5" name="description"></textarea>
		@if ($errors->has('description'))
			<span class="text-danger">{{ $errors->first('description') }}</span>
		@endif
	</div>
	<div class="mb-5">
		<label for="picture" class="form-label">Picture</label>
		<input type="file" class="form-control" id="" name="picture" value="">
		@if ($errors->has('picture'))
			<span class="text-danger">{{ $errors->first('picture') }}</span>
		@endif
	</div>
	<div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
		<button type="submit" class="btn_chat">Create gallery</button>
		<a href="/gallery" class="text-center my-3">
			Cancel
		</a>
	</div>

</form>
@endsection