<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Post;
use DB;
class AdminController extends Controller
{
    public function dashboard() {
        return view ('admin.dashboard');

    }
    public function manageusers() {
        $users = User::all();
        if($users !== NULL) {
            return view('admin.manageusers', ['users' => $users]);
    }
    else {
        echo "Ka ndodhur nje gabim";
    }
    
    }
    public function manageposts() {
        $posts = Post::all();
        return view('admin.manageposts', ['posts' => $posts]);
    }
    public function editpost($id) {
        $post = Post::find($id);
        return view('admin.editpost', ['post' => $post]);
    }
    public function deletepost($id)
{
    $post = Post::findOrFail($id);
    $post->delete();
    return redirect()->route('manage.posts')->with('success', 'Post has been successfully deleted');
}
public function manageuser($id) {
    $user = User::find($id);
    return view('admin.manageuser', compact('user'));
}
public function deleteuser($id) {
    $user = User::find($id);

    if ($user) {
        $user->delete();
    }

    return redirect()->route('manage.users')->with('success', 'User Has been deleted Successfully');

}
public function search(Request $request)
{
    $query = $request->input('query');
    $results = DB::table('users')->where('name', 'like', '%'.$query.'%')->get();
    $results = DB::table('users')->where('email', 'like', '%'.$query.'%')->get();
    return view('admin.search', ['results' => $results, 'query' => $query]);
}


}
  
