@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="max-width: 90%">
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
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $score["name"] }}</td>
                <td>{{ $score["score"] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection
