<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
		body{
			font-family: 'Poppins', sans-serif !important;
		}
	</style>
    <title>Fadhill Atmojo | @yield('title')</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center">
		<div class="card w-75 rounded-4 p-2" style="box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.1);">
			<div class="card-body">
			  	<h4 class="card-title text-center my-4">@yield('card-title')</h4>
				@yield('container')
			</div>
		</div>
	</div>
	<script src="main.js"></script>
	<script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>