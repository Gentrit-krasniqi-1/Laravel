@extends('layouts.app')

@section('content')

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Search...">
    <button type="submit">Search</button>
</form>

@endsection