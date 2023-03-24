@extends('admin.app')
@section('content')


<form method="POST" action="{{ route('update',$post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }} <a href="{{route('manage.posts')}}">Click here to view all posts</a>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
<div class="card-body">
    <div class="form-group">
        <label for="title"><h4>Title</h4></label>
        <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="content"><h4>Content</h4></label>
        <textarea name="content" class="form-control" id="content" value="{{$post->content}}">{{$post->content}}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="content"><h4>Slug</h4></label>
        <textarea name="slug" class="form-control" id="slug" value="slug">{{$post->slug}}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="image"><h4>Image</h4></label>
    <input type="file" class="form-control-file" name="image" id="image" value="{{$post->image}}">
</div>
    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
  
    </div>
</form>
<form action="{{ route('deletepost', $post->id) }}" method="POST">
        <div class="card-body">
        <a href="{{route('manage.posts')}}" class="btn btn-primary">CANCEL</a>
</div>
    
    @csrf
    @method('DELETE')
    <div class="card-body">
    <button type="submit" class="btn btn-primary">DELETE POST</button>
</div>



</form>


@endsection



@section('title')
{{$post->title}}

@endsection