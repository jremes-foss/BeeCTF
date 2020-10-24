@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="max-width: 90%">
        <div class="col-md-8">
            <form class="form form-horizontal" id="apiTokenForm" role="form" method="post" enctype="multipart/form-data" action="{{ route('user.updateApiToken') }}">
                <div class="form-group">
                    <label for="inputApiToken">API Token</label>
                    <div class="input-group ApiToken">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                        <input type="text" class="form-control" id="inputApiToken" name="inputApiToken" value="{{ $api_token }}">
                    </div>
                <button id="regenerate" type="submit" class="btn btn-primary">Regenerate</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: { 
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#regenerate').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('user.updateApiToken') }}",
                type: "POST",
                contentType: "json",
                success: function() {
                    console.log("Success");
                },
                error: function() {
                    console.log("ERROR");
                    console.log(e)
                }
            });
        });
    });
</script>
@endsection