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
				<div class="panel-body">
					<p>Category: {{ $challenge->category }}</p>
					<p>Score: {{ $challenge->score }}</p>
					<p>Description: {{ $challenge->content }}</p>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#flagValidation">
						Solve Challenge
					</button>
				</div>
			</div>
		@endforeach
	</div>
</div>

<!-- Submit Flag Modal -->
<div class="modal fade" id="flagValidation" tabindex="-1" role="dialog" aria-labelledby="flagValidationLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Submit Flag</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Please make sure your flag does not have any typos before submission.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection
