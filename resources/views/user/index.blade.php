@extends('layouts.form-master')
{{--  ini untuk judul tab  --}}
@section('title')
    Data User
@endsection
{{--  Untuk title card  --}}
@section('card-title')
    Data User
@endsection

{{--  section container  --}}
@section('container')
{{-- tombol to show --}}
	@if ($message = Session::get('message'))
		<div class="alert alert-success">
			{{ $message }}
		</div>
	@endif
	<div class="container">
	<table class="table table-bordered text-center">
		<thead>
		<tr>
		<th scope="col">No</th>
		<th scope="col">name</th>
		<th scope="col">email</th>
		<th scope="col">photo</th>
		<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($users as $user)
			<tr>
				<th scope="row">{{ $loop->iteration }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td><img src="{{ asset('storage/photos/'.$user->photo) }}" alt="anjay" width="150px"></td>
				<td>
					<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
					<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger my-2">Delete</button>

					</form>
					<a href="{{ route('user.resize', $user->id) }}" class="btn btn-success  my-2">Resize</a>
				</td>
			</tr>
		@endforeach
		
		</tbody>
	</table>
	<a href="{{ route('dashboard') }}" class="btn btn-primary text-center my-3">
		< Back to dashboard
	</a>
	</div>
@endsection