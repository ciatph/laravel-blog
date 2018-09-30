@extends('layout')

@section('content')
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>

        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                <li>
                    <a href="/posts/tags/{{ $tag->name }}">
                        {{ $tag->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        @endif

        {{ $post->body }}

        <hr>

        <div class="commnents">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->created_at->diffForHumans() }}: </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Add a comment --}}
        <div class="card">
            <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">

                    {{ csrf_Field() }}

                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Your comment here"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>

                @include('layouts.errors')
            </div>
        </div>
    </div>
@endsection