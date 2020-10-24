@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="max-width: 90%">
        <div class="col-md-8">
            <form class="form form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ route('user.updateApiToken') }}">
                <div class="form-group">
                    <label for="inputApiToken">API Token</label>
                    <div class="input-group ApiToken">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                        <input type="text" class="form-control" id="inputApiToken" name="inputApiToken" value="{{ $api_token }}">
                    </div>
                <button id="regenerate" class="btn btn-primary">Regenerate</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $.ajaxSetup({
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#regenerate').click(function(e) {
            $.ajax({
                url: "{{ route('user.updateApiToken') }}",
                type: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log("ERROR:" + data);
                }
            });
        });
    });
</script>
@endsection