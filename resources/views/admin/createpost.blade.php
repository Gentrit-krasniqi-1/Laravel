@extends('admin.app')


@section('content')
<div class="col-md-9">
    <div class="card-body">
<a href="{{route('manage.posts')}}" class="btn btn-primary">Click here to view all posts</a>
</div>
<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
    @csrf
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
    <div class="form-group">
        <label for="title"><h4>Title</h4></label>
        <input type="text" name="title" class="form-control" id="title">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="content"><h4>Content</h4></label>
        <textarea name="content" class="form-control" id="content"></textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="image"><h4>Image</h4></label>
    <input type="file" class="form-control" name="image" id="image">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>





    <button type="submit" class="btn btn-primary">Add Post</button>
</form>

</div>

@endsection

@section('title')
Create Post

@endsection
