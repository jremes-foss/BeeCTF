@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
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
					<p>Attachment: </p>
					<button type="button" 
					class="btn btn-primary"
					data-id="{{ $challenge->id }}"
					data-toggle="modal" 
					data-target="#flagValidation">
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
				<p><strong>Before submission:</strong> please make sure your flag does not have any typos.</p>
				<form id="submitFlag" method="post" action="{{ route('user.submitflag') }}">
					<div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label for="flag">Flag:</label>
						<input type="text" name="flag" placeholder="FLAG{th1s_1s_4n_3x4mpl3}">
						<input name="id" value="{{ $challenge->id }}" type="hidden">
						<input type="submit" class="submit_flag" value="Submit Flag">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection

