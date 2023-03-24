@extends('layouts.app')


@section('content')

<form action="{{ route('comments.update',$comments->id) }}" method="POST">
    @csrf
    @method('PUT')
 
<div class="card-body">
    <h1>EDIT COMMENT</h1>
</div>
<div class="card-body">
@if(session('success'))
    <div class="alert alert-success"> 
        {{ session('success') }}
        </div>
@endif
</div>
<div class="card-body">
    <h4>Comment:</h4>
    <textarea name="body">{{ old('body', $comments->body) }}</textarea>
</div>
<div class="card-body">
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>
<div class="card-body">
  <a href="{{ back()->getTargetUrl() }}" class="btn btn-primary">CANCEL</a>
</div>
</form>


@endsection
@section('title')
Edit Comment 

@endsection