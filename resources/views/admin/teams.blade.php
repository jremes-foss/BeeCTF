@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="max-width: 90%">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <a class="btn btn-primary btn-sm pull-left" href="{{ route('admin.teams.create') }}" role="button">New Team</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <th scope="row">{{ $team->id }}</th>
                <td>{{ $team->name }}</td>
                <td>
                    <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection