@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Gallery 
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Gallery Index
@endsection

{{--  section container  --}}
@section('container')
<a href="{{ route('gallery.create') }}" class="btn_chat mb-5">(+) Create gallery</a>
<div class="row mt-5">
	@if(count($galleries)>0)
	@foreach ($galleries as $gallery)
	<div class="col-sm-2">
		<div>
			<a class="example-image-link" href="{{asset('storage/posts_image/'.$gallery['picture'] )}}" data-lightbox="roadtrip"
				data-title="{{$gallery['description']}}">
				<img class="example-image img-fluid mb-2"src="{{asset('storage/posts_image/'.$gallery['picture'] )}}" alt="image-1" />
			</a>
			<a href="{{ route('gallery.edit', $gallery['id']) }}" class="btn btn-primary">Edit</a>
			<form onsubmit="return confirm('Yakin ingin hapus ?');" action="{{ route('gallery.destroy', $gallery['id']) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger my-2">Delete</button>
			</form>
		</div>
	</div>
	@endforeach
	@else
	<h3>Tidak ada data.</h3>
	@endif
	{{-- <div class="d-flex">
		{{ $galleries->links() }}
	</div> --}}
	<div class="d-flex mt-5">
		<a href="{{ route('dashboard') }}" class="btn btn-outline-danger">< Back to Home</a>
	</div>
</div>
@endsection