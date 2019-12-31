@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		@foreach($announcements as $announcement)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
					{{ $announcement->title }}
				</h4>
			</div>
			<div class="panel-body">
				<p>{{ $announcement->content }}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection