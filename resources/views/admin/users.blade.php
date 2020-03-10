@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
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
