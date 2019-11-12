@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<table class="table table-hover">
		<thead>
		    <tr>
			  	<th scope="col">#</th>
			  	<th scope="col">Name</th>
			  	<th scope="col">Score</th>
		    </tr>
		</thead>
		<tbody>
			@foreach($scores as $score)
				<th scope="row"></th>
				<td></td>
				<td></td>
			@endforeach
		</tbody>
	</table>
	</div>
</div>

@endsection
