@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@foreach($challenges as $challenge)
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						{{ $challenge->title }}
					</h4>
				</div>
			</div>
			<div class="panel-wrapper">
				<div class="panel-body">
					<p>Category: {{ $challenge->category }}</p>
					<p>Score: {{ $challenge->score }}</p>
					<p>Description: {{ $challenge->content }}</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
