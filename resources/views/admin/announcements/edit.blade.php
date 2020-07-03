@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<form role="form" method="post" action="{{ route('admin.announcements.update', $announcement->id) }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="inputTitle">
					Title
				</label>
				<div class="input-group Announcement">
					<span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
					<input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $announcement->title }}">
				</div>
				<label for="inputContent">
					Content
				</label>
				<div class="input-group Announcement">
					<span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
					<input type="text" class="form-control" id="inputContent" name="inputContent" value="{{ $announcement->content }}">
				</div>
				<input type="submit" class="submit" value="Submit">
			</div>
		</form>
	</div>
</div>
@endsection