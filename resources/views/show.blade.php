@extends('layouts.app')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@section('content')
<style>
    h1 {
        color:black
    }
    p {
        color:black
    }
    h4 {
        color:black
    }
    card-body {
        color:black
    }
    h5 {
        color:black
    }
    </style>
<div class="card-body">
<h1>{{ $post->title }}</h1>
</div>
<div class="card-body">
</div>
<div class="card-body">
<p>{{!! nl2br(e($post->content)) !!}}</p>
</div>
<div class="card-body">
<img src="{{ URL::to('/' . $post->image) }}" alt="Image" style="width:500px;height:300">   

       </div>    
</div>

<div class="card-body">
    <h4>Comments:</h4>
</div>
@auth
<form method="POST" action="{{route('storecomment') }}">
    @csrf
<div class="card-body">
    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <label for="body">Add a Comment:</label>
    <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>

    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endauth
@guest
<div class="card-body">
<h5>You must be logged in to comment</h5>
</div>
@endguest
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@foreach ($comments as $comment)
    <div class="card">
      
        <div class="card-body">

        {{ $comment->user->name }}: {{ $comment->body }}
        <div class="card-body">
        {{$comment->created_at}}
        </div>
        @if (Auth::check() && Auth::user()->id === $comment->user_id)
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-primary">DELETE</button>
</form>

@endif

        </div>
    </div>
@endforeach


@endsection
@section('title')
{{$post->title}}

@endsection

