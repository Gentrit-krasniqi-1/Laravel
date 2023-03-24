@extends('layouts.app')


@section('content')
<div class="card-body">
    <h1>ADD PROFILE PICTURE</h1>


    <form method="POST" action="{{route('addprofilepicture')}}">
        @csrf 
        <input type="file" class="form-control" name="profile_picture" id="profile_picture">
        <div class="card-body">
            <button class="btn btn-primary">ADD</button>
        </div>
        <img src="{{asset('public/YsqUOZMgem3NfP7mw4535404JtvmVsV7o7mM5iCZ.jpg')}}" alt="Image" style="width:500px;height:300">   


    </form>
</div>







@endsection