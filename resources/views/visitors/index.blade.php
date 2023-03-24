@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Visitors</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Last Visit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->ip_address }}</td>
                                <td>{{ $visitor->user_agent }}</td>
                                <td>{{ $visitor->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection