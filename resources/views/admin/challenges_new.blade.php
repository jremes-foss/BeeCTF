@extends('layouts.app')

@section('content')
<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>
<div class="container">
	<div class="row">
		<form role="form" method="post" action="{{ route('admin.new_challenge.store') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="inputCategory">
					Category
				</label>
				<div class="input-group Category">
					<span class="input-group-addon"><i class="fa fa-address-book"></i></span><input type="text" class="form-control" id="inputCategory" name="inputCategory" placeholder="Enter Category">
				</div>
			</div>
			<div class="form-group">
				<label for="inputScore">
					Score
				</label>
				<div class="input-group Score">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" id="inputScore" name="inputScore" placeholder="Enter Score">
				</div>
			</div>
			<div class="form-group">
				<label for="inputTitle">
					Title
				</label>
				<div class="input-group Title">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Enter Title">
				</div>
			</div>
			<div class="form-group">
				<label for="inputTitle">
					Flag
				</label>
				<div class="input-group Flag">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" id="inputFlag" name="inputFlag" placeholder="Enter Flag">
				</div>
			</div>
			<div class="form-group">
				<label for="inputTitle">
					Content
				</label>
				<div class="input-group Content">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" id="inputContent" name="inputContent" placeholder="Enter Content">
				</div>
			</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>

		</form>
	</div>
</div>
@endsection