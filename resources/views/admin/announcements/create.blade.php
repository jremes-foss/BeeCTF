@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row" style="max-width: 90%">
		<form role="form" method="post" action="{{ route('admin.announcements.store') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="inputTitle">
					Title
				</label>
				<div class="input-group Announcement">
					<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
					<input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Enter Title">
				</div>
				<label for="inputContent">
					Content
				</label>
				<div class="input-group Announcement">
					<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
					<input type="text" class="form-control" id="inputContent" name="inputContent" placeholder="Enter Content">
				</div>
				<input type="submit" class="submit" value="Submit">
			</div>
		</form>
	</div>
</div>
@endsection