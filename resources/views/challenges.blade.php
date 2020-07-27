@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row" style="max-width: 90%">
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
		<form method="get" action="{{ route('user.challenges') }}">
		{{ csrf_field() }}
			<div class="form-inline">
				<select name="category" class="form-control form-control-lg" id="choose_category">
					<option value="0">Select a category...</option>
					@foreach($categories as $category)
						<option value="{{ $category->category }}">{{ $category->category }}</option>
					@endforeach
				</select>
				<button type="submit" class="btn btn-primary" value="submit">Search</button>
			</div>
		</form>
	</div>
	@if(request()->has('category') && request()->input('category') != "0")
		@foreach($challenges as $challenge)
			<!-- Most likely not the most efficient method to do this, but it works! :) -->
			<!-- I probably should write a scope for this. -->
			@if($challenge->challengeCategories->categories->category == $categories->where('category', '=', request()->category)->pluck('category')->toArray()[0])
				<div class="panel panel-primary" style="max-width: 90%">
					<div class="panel-heading">
						<h4 class="panel-title">
							{{ $challenge->title }}
						</h4>
					</div>
					<div class="panel-body">
						<!-- Another ugly hack here, refactor pl0x. -->
						<p>Category: 
							{{ 
								$challenge->join('challenge_category', 'challenge_category.challenge_id', '=', 'challenges.id')
								->join('categories', 'challenge_category.category_id', '=', 'categories.id')
								->select('categories.category')
								->where('challenge_category.challenge_id', '=', $challenge->id)
								->value('category') 
							}}
						</p>
						<p>Score: {{ $challenge->score }}</p>
						<p>Description: {{ $challenge->content }}</p>
						<p>Attachment: <a href="{{ route('user.download', $challenge->id) }}">Download</a></p>
						<button type="button" 
						class="btn btn-primary"
						data-id="{{ $challenge->id }}"
						data-toggle="modal" 
						data-target="#flagValidation">
							Solve Challenge
						</button>
					</div>
				</div>
				@endif
			@endforeach
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
	@else
		@if (request()->get('category') == "Select a category...")
		<div class="container">
			<div class="row" style="max-width: 90%">
				<div class="alert alert-info">
					Please choose a category to start.
				</div>
			</div>
		</div>
		@else
		<div class="container">
			<div class="row" style="max-width: 90%">
				<div class="alert alert-info">
					No solvable challenges in category.
				</div>
			</div>
		</div>
		@endif
	@endif
@endsection
