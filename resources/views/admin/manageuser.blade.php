@extends('admin.app')


@section('content')
<style>
    h3 {
        color:blue
    }
    </style>
<div class="container">


<h3>Name:</h3>

<h3>Email: {{$user->email}}</h3>
<h3>Admin:<input type="text" id="is_admin" name="is_admin" value="{{$user->is_admin}}"></input></h3>

<h3>Created At: {{$user->created_at}}</h3>


<form id="delete-form" action="{{route('deleteuser',$user->id)}}" method="POST">
@method('delete')
        @csrf
<button class="btn btn-primary">DELETE USER</button>



</div>
</form>
@endsection

@section('title')
Manage User {{$user->name}}

@endsection