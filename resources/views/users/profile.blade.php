@extends('layouts.app')

@section('content')
<div class="card-body">
        <h1>Profile</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
    <a href="{{route('users.edit')}}" class="btn btn-primary">EDIT PROFILE</a>
</div>

   
@endsection


    @section('title')
     My Profile

    @endsection