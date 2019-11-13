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
			  	<th scope="col">Category</th>
			  	<th scope="col">Description</th>
			  	<th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($categories as $category)
		  	<tr>
		  		<th scope="row">{{ $category->id }}</th>
		  		<td>{{ $category->category }}</td>
		  		<td>{{ $category->description }}</td>
		  		<td>
		  			<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
		  			<a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-danger">Delete</a>
		  		</td>
		  	</tr>
		  	@endforeach
		  </tbody>
		</table>
	</div>
</div>

@endsection
