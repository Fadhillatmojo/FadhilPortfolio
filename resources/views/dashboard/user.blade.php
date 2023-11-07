<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User</title>
</head>
<body>
	<table class="table">
		<thead>
		  <tr>
		    <th scope="col">id</th>
		    <th scope="col">name</th>
		    <th scope="col">email</th>
		    <th scope="col">photo</th>
		  </tr>
		</thead>
		<tbody>
		  @foreach ($users as $user)
			<tr>
				<th scope="row">{{ $user->id }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td><img src="{{ asset('storage/'.$user->photo) }}" alt="anjay" width="150px"></td>
			</tr>
		  @endforeach
		  
		</tbody>
	   </table>
</body>
</html>