@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="max-width: 90%">
        <div class="col-md-8">
            <form class="form form-horizontal" role="form" method="post" enctype="multipart/form-data" action="#">
                <div class="form-group">
                    <label for="inputApiToken">API Token</label>
                    <div class="input-group ApiToken">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                        <input type="text" class="form-control" id="inputScore" name="inputScore" value="{{ $api_token }}">
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>

@endsection