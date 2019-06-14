@extends('layouts.app')
@section('content')
<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>
<div class="container">
	<div class="row">
		<form role="form" method="post" action="{{ route('admin.categories.store') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="inputCategory">
					Category
				</label>
				<div class="input-group Category">
					<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
					<input type="text" class="form-control" id="inputCategory" name="inputCategory" placeholder="Enter Category">
				</div>
				<label for="inputDescription">
					Description
				</label>
				<div class="input-group Category">
					<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
					<input type="text" class="form-control" id="inputDescription" name="inputDescription" placeholder="Enter Description">
				</div>
				<input type="submit" class="submit" value="Submit">
			</div>
		</form>
	</div>
</div>
@endsection