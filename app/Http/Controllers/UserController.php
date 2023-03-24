<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;;
use User;
use Hash;
use Rule;

class UserController extends Controller

{
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $user = Auth::user();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password'];

    $user->name = ($request->input('name',FILTER_SANITIZE_STRING));
    $user->email = ($request->input('email',FILTER_SANITIZE_STRING));
    $user->password = Hash::make(($request->input('password',FILTER_SANITIZE_STRING)));

    $user->save();
    if ($user->save()) {
        return back()->with('success', 'Profile has been updated successfully'); 
    } elseif ($user->save() == NULL) {
        return back()->withErrors('error', 'Something went wrong');
    }

}
public function user() {
    return view('profile');
}
public function edit()
{
    $user = Auth::user();
    if ($user = Auth::user()) {
        return view('edit', compact('user'));
    } else {
        echo "You must be logged in to reach this page";
    }
 
    
}
public function profile() {
    $user = Auth::user();
    return view('users.profile',compact('user'));
}
public function addprofilepicture(Request $request) {
    $user = Auth::user();
    $user->profile_picture = $request->file('image')->store('public');
    $user->save();
    if ($user->save()) {
        echo "FOTOJA E PROFILIT U BE UPDATE ME SUKSES";
    } else {
        echo "GABIM";
    }
}






}
