<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.createpost');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|min:15',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::find($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->slug = $validatedData['slug'];
        $post->save();
        if ($post->save()) {
        return back()->with('success', 'Post has been updated Successfully.');
    } elseif ($post->save() == NULL) {
        echo "GABIM";
    }
       
}
public function show($id)
{
    $post = Post::find($id);
    $comments = $post->comments()->latest()->with('user')->get();
    return view('show', ['post' => $post],['comments' => $comments]);
}
public function storecomment(Request $request)
{
    $comment = new Comment;

    $comment->post_id = $request->post_id;
    $comment->user_id = auth()->user()->id;
    $comment->body = $request->body;

    $comment->save();

    return back();
}
public function destroy($id)
{
    $comment = Comment::find($id);
    Comment::whereIn('id', $comment)->delete();

    return redirect()->back()->with('success','Your Comment has been successfully deleted');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|min:20',
        'content' => 'required|min:50',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ], [
        'title.required' => 'You have to put title on the post min 20 characters.',
        'content.required' => "You have to put some content on the post min 50 characters.",
        'image.required' => "You have to put an image on your post max -> 2048kb",
    ]);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->slug = Str::slug($request->input('title'));
    $post->image = $request->file('image')->store('public');
    $post->save();

    return redirect('/posts/create')->with('success', 'Post created successfully.');
}
public function showpost() {

   // $post = Post::all();
    //$post = Post::orderBy('created_at', 'desc')->take(5)->get();
    $post = DB::table('posts')->orderBy('created_at', 'desc')->paginate(2);
    //$post = Post::paginate(2)->latest();
    return view('home', ['posts' => $post]);

}
public function editcomment($id) {
    $comments = Comment::find($id);
    return view('users.editcomment', compact('comments'));
}
public function updatecomment(Request $request, $id) {
    $comment = Comment::findOrFail($id);
    $comment->body = $request->input('body',FILTER_SANITIZE_STRING);
    $comment->save();
    return redirect()->back()->with('success' , 'Your comment has been successfully updated');
}

}