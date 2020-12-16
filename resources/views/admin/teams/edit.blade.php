@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <form role="form" method="post" action="{{ route('admin.teams.update', $team->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName">
                    Title
                </label>
                <input type="submit" class="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
@endsection