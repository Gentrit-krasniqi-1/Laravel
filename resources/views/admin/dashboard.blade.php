@extends('admin.app')

@section('content')
<style>
    h1 {
        color:blue
    }
    </style>
<div class="col-md-12">
<div class="card-header"><h2>{{ __('Admin Dashboard') }}</h2></div>
</div>
<div class="card-body">
    <div class="card-body"> 
    <a href="{{route('manage.posts')}}" class="btn btn-primary">Manage Posts</a>
    </div>
    <div class="card-body"> 
    <a href="{{route('manage.users')}}" class="btn btn-primary">Manage Users</a>
    </div>
</div>

</div>
</div>



@endsection
@section('title')
Admin Dashboard
@endsection