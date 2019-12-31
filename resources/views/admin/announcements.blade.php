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
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	</div>
</div>

@endsection