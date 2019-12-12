@extends('layouts.app')

@section('content')

<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>

<div class="container">
	<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">E-mail</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<th scope="row">{{ $user->id }}</th>
						<td scope="row">{{ $user->name }}</td>
						<td scope="row">{{ $user->email }}</td>
						<td scope="row">
							<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info">Edit</a>
							<a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
