@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        h1 {
            color::blue
        }
    </style>
    <h1>Profile</h1>
    @if(!empty($successMsg))
        <div class="alert alert-success"> {{ $successMsg }}</div>
      @endif
</div>
@endsection