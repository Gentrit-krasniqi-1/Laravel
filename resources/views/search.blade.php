@extends('layouts.app')


@section('content')
<style>
    h2 {
        color:blue
    }
    h3 {
        color:black
    }
    </style>
@if(count($results) > 0)
<div class="card-body">
    <h2>Search Results for "{{ $query }}"</h2>
</div>
    @foreach($results as $result)
    <div class="card-body">
    <a href="{{route('show',['id' => $result->id])}}"><h3>{{ $result->title }}</h3></a>
    <img src="{{ URL::to('/' . $result->image) }}" alt="Image" style="width:500px;height:300">   
    
</div>
    @endforeach
@else
<div class="card-body">
    <h3>No results found for "{{ $query }}"</h2>
    </div>
@endif
</div>

@endsection


@section('title')
{{ $query }}

@endsection