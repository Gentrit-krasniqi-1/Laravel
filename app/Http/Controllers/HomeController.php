<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use id;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all();
        return view('home', ['posts' => $post]);
    }


    public function baba()
    {
        $post = Post::all();
        $post = Post::paginate(1);
    
        return view('home', ['posts' => $post]);
    }

    ##public function show($id)
    ##{
       ## $post = Post::find($id);
      ## return view('posts.show', ['post' => $post]);
    ##}
    public function aboutus() {
        return view('aboutus');
    }
}
