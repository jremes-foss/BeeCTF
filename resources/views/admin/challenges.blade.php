@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="max-width: 90%">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <a class="btn btn-primary btn-sm pull-left" href="{{ route('admin.challenges.create') }}" role="button">New Challenge</a> 
        <table class="table table-hover">
          <thead>
            <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category</th>
                  <th scope="col">Score</th>
                  <th scope="col">Title</th>
                <th scope="col">Flag</th>
                  <th scope="col">Content</th>
                  <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach($challenges as $challenge)
              <tr>
                  <th scope="row">{{ $challenge->id }}</th>
                  <td><!-- Ugly way, refactor!! -->
                      {{
                          $challenge->join('challenge_category', 'challenge_category.challenge_id', '=', 'challenges.id')->join('categories', 'challenge_category.category_id', '=', 'categories.id')->select('categories.category')->where('challenge_category.challenge_id', '=', $challenge->id)->value('category')
                      }}
                  </td>
                  <td>{{ $challenge->score }}</td>
                  <td>{{ $challenge->title }}</td>
                  <td>{{ $challenge->flag }}</td>
                  <td>{{ $challenge->content }}</td>
                  <td>
                      <a href="{{ route('admin.challenges.edit', $challenge->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ route('admin.challenges.delete', $challenge->id) }}" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection

