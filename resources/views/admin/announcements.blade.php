@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="max-width: 90%">
	@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session()->get('message') }}
	</div>
	@endif
	<a class="btn btn-primary btn-sm pull-left" href="{{ route('admin.announcements.create') }}" role="button">New Announcement</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">Content</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($announcements as $announcement)
			<tr>
				<th scope="row">{{ $announcement->id }}</th>
				<td>{{ $announcement->title }}</td>
				<td>{{ $announcement->content }}</td>
				<td>
					<a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-info">Edit</a>
					<a href="{{ route('admin.announcements.delete', $announcement->id) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>

@endsection