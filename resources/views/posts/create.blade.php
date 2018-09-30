@extends('layout')

@section('content')
    <div class="col-md-8">
        <h1>Create a Post</h1>
        
        <form method="POST" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" id="body" name="body" cols="30" rows="10" class="form-control"></textarea>
            </div>    
            
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>

        @include('layouts.errors')
    </div>
@endsection