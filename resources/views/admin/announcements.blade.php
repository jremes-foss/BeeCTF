@extends('layouts.app')

@section('content')
<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>

<div class="container">
	<div class="row">
	<a class="btn btn-primary" href="{{ route('admin.categories.create') }}" role="button" style="float: right;">New Category</a>
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
				<th scope="row">{{ $announcement->id }}</th>
				<td>{{ $announcement->title }}</td>
				<td>{{ $announcement->content }}</td>
				<td>
					<a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-info">Edit</a>
					<a href="{{ route('admin.announcements.delete', $announcement->id) }}" class="btn btn-danger">Delete</a>
				</td>
			@endforeach
		</tbody>
	</table>
	</div>
</div>

@endsection