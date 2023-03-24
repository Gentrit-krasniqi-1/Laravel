@extends('layouts.app')

@section('content')
<style>
     h3 {
          color:black
     }
     </style>
                
               <div class="col-md-9">
               <div class="card-header">
               <div class="card">
                    <h1>Posts</h1>
                    </div>
                    </div>
                    </div>      
                    @foreach ($posts as $post)
                    <div class="col-md-12">
                    <div class="card-body">
               <a href="{{route('show',$post->id)}}" class="h3"><h3>{{ $post->title }}</h3></a>
               <img src="{{$post->image}}" alt="Image" style="width:500px;height:300">
               </div>
               </div>
 
               </div>
               @endforeach
               <div class="card-body">
                    {{$posts->links('pagination')}}
          
</div>

@endsection

@section('title')
Home

@endsection
