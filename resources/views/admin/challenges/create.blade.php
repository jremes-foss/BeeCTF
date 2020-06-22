@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<form class="form form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.challenges.store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="inputCategory">
						Category
					</label>
					<div class="input-group Category">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<select class="form-control" id="inputCategory" name="inputCategory">
						@foreach($categories as $category)
							<option value="{{ $category->category }}">{{ $category->category }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputScore">
						Score
					</label>
					<div class="input-group Score">
						<span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
						<input type="text" class="form-control" id="inputScore" name="inputScore" placeholder="Enter Score">
					</div>
				</div>
				<div class="form-group">
					<label for="inputTitle">
						Title
					</label>
					<div class="input-group Title">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Enter Title">
					</div>
				</div>
				<div class="form-group">
					<label for="inputTitle">
						Flag
					</label>
					<div class="input-group Flag">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="inputFlag" name="inputFlag" placeholder="Enter Flag">
					</div>
				</div>
				<div class="form-group">
					<label for="inputTitle">
						Content
					</label>
					<div class="input-group Content">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="inputContent" name="inputContent" placeholder="Enter Content">
					</div>
				</div>
				<div class="form-group">
					<label for="inputFile">
						File
					</label>
					<div class="input-group Content">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="file" class="form-control" id="inputFile" name="inputFile">
					</div>
				</div>
				<div class="form-group">
					<label for="inputFile">
						URL
					</label>
					<div class="input-group Content">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="inputURL" name="inputURL">
					</div>
				</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection