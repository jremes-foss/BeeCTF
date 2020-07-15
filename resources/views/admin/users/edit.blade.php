@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row" style="max-width: 90%">
		<form role="form" method="post" action="{{ route('admin.users.update', $user->id) }}">
			{{ method_field('post') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="inputName">
					Name
				</label>
				<div class="input-group Name">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" id="inputName" name="inputName" value="{{ $user->name }}">
				</div>
				<label for="inputEmail">
					Email
				</label>
				<div class="input-group Email">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input type="text" class="form-control" id="inputEmail" name="inputEmail" value="{{ $user->email }}">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>

@endsection