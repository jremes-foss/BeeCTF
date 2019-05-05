@extends('layouts.app')

@section('content')
<div id="sidebar" class="col-md-4">
	@include('layouts.sidebar')
</div>
<div class="container">
	<div class="row">
		<a class="btn btn-primary" href="#" role="button" style="float: right;">New Challenge</a> 
		<table class="table table-hover">
		  <thead>
		    <tr>
			  	<th scope="col">#</th>
			  	<th scope="col">Category</th>
			  	<th scope="col">Score</th>
			  	<th scope="col">Title</th>
				<th scope="col">Flag</th>
			  	<th scope="col">Content</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Forensics</td>
		      <td>350</td>
		      <td>Wireshark</td>
		      <td>FLAG{w1r3sh4rk_1s_c00l!}</td>
		      <td>Can you find a flag with Wireshark?</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Web</td>
		      <td>100</td>
		      <td>SQL Injection</td>
		      <td>FLAG{s4n1t1z3_y0ur_1nput!}</td>
		      <td>Can you find a flag from the database?</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Crypto</td>
		      <td>300</td>
		      <td>RSA</td>
		      <td>FLAG{m1nd_th3_k3ys!}</td>
		      <td>Can you break this ciphertext?</td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div>
@endsection

