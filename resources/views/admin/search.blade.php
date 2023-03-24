@extends('admin.app')


@section('content')

@if(count($results) > 0)
<div class="container">
    <h2>Search Results for "{{ $query }}"</h2>
</div>
    @foreach($results as $result)
    <div class="container">
    <h4><a href="">{{$result->name}}</a></h4>
</div>
    @endforeach
@else
    <h2>No results found for "{{ $query }}"</h2>
@endif
</div>

@endsection


@section('title')

{{$query}}

@endsection