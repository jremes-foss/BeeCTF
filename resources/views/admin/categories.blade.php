@extends('layouts.app')

@section('content')
<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>
<div class="container">
	<div class="row">
		<a class="btn btn-primary" href="{{ route('admin.categories.new') }}" role="button" style="float: right;">New Category</a> 
		<table class="table table-hover">
		  <thead>
		    <tr>
			  	<th scope="col">#</th>
			  	<th scope="col">Category</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($categories as $category)
		  	<tr>
		  		<th scope="row">{{ $category->id }}</th>
		  		<td>{{ $category->category }}</td>
		  	</tr>
		  	@endforeach
		  </tbody>
		</table>
	</div>
</div>

@endsection
