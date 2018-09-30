@extends('layout')


@section('content')
  <div class="col-sm-8 blog-main">
    @foreach ($posts as $post)
      @include('posts.post')
    @endforeach
  </div>
@endsection

