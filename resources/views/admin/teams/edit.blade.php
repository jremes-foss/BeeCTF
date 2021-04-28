@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="max-width: 90%">
        <form role="form" method="post" action="{{ route('admin.teams.update', $team->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName">
                    Name
                </label>
                <div class="input-group Category">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Enter Team Name" value="{{ $team->name }}">
                </div>
                <input type="submit" class="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
@endsection