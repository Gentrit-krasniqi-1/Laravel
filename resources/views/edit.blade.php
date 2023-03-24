@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('users.update',$user->id) }}">
    @csrf
    @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
      @endif
      <div class="card">
        <div class="card-header"><h2>{{ __('EDIT PROFILE') }}</h2></div>
</div><div class="card-body">
        <h1>Profile</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" id="name" value="{{$user->name}}"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" id="email" value="{{$user->email}}"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" id="password" value=""></td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
    <button class="btn btn-primary" type="submit">SAVE CHANGES</button>
    <a href="{{route('profile')}}" class="btn btn-primary">CANCEL</a>
</div>
</form>

@endsection

@section('title')
Edit Profile

@endsection