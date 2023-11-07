@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Resize image User
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Resize Image
@endsection

@section('container')
    @if ($message = Session::get('message'))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif
    <div class="d-flex align-items-center justify-content-center flex-column">
        <img src="{{ asset('storage/photos/'.$user->photo) }}" width="300" class="mb-5" alt="{{ $user->name }}">
        <form action="{{ route('user.resizePost', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary my-2">Resize Ke bentuk Thumbnail (100x100)> </button>
            <a href="{{ route('user.index') }}" class=" btn btn-danger text-center my-3">
				Cancel
			</a>

        </form>
    </div>
@endsection