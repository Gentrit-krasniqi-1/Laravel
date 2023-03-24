@extends('admin.app')

@section('content')
<style>
    h1 {
        color: blue
    }
</style>
<div class="card-body">
    <h1>Manage Posts</h1>
</div>
<div class="card-body">
<a href="{{route('admin.createpost')}}" class="btn btn-primary">+Write Post</a>
</div> 
<div class="card-body">                       
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }} 
    </div>
@endif
</div>


                @foreach ($posts as $post)
                <div class="card-body">
                    <a href="{{route('edit.post',$post->id)}}">{{ $post->title }}</a>
                </div>
                @endforeach



@endsection


@section('title')

Manage Posts
@endsection