@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="max-width: 90%">
        <form role="form" method="post" action="{{ route('admin.teams.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputTitle">
                    Team
                </label>
                <div class="input-group Announcement">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                    <input type="text" class="form-control" id="inputTeam" name="inputTeam" placeholder="Enter Team">
                </div>
                <input type="submit" class="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
@endsection