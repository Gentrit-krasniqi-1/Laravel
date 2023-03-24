@extends('admin.app')


@section('content')
<style>
    h1 { 
        color:blue
    }
    </style>
<h1>Manage Users</h1>
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<form action="{{ route('admin.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
                            </form>
</div>
<div class="col-md-3">
<div class="container">
@foreach ($users as $user)
            <h4><a href="{{route('manage.user',$user->id)}}" class="my-link">{{$user->name}}    ID {{$user->id}}</a></h4>
        @endforeach

</div>
</div>
@endsection

@section('title')
Manage Users

@endsection