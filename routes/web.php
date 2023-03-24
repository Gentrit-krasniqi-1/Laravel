<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Auth::routes();
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PostController::class, 'showpost'])->name('show.post');
Route::get('/home', [App\Http\Controllers\PostController::class, 'showpost'])->name('show.post');
Route::get('/edit/comment/{id}', [App\Http\Controllers\PostController::class, 'editcomment'])->name('editcomment');
Route::put('/comments/{id}', [App\Http\Controllers\PostController::class, 'updatecomment'])->name('comments.update');

Route::prefix('posts')->middleware('auth','admin')->group(function () {
Route::get('/post/{id}', [App\Http\Controllers\PostController::class ,'show'])->name('show');
Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/create', [App\Http\Controllers\PostController::class, 'create']);
//Route::get('/show/{slug}', [App\Http\Controllers\PostController::class, 'show']);
Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit']);
Route::put('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
});

Route::prefix('admin')->middleware('auth','admin')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\AdminController::class ,'dashboard'])->name('admin.dashboard');
    Route::get('create/post', [App\Http\Controllers\PostController::class, 'create'])->name('admin.createpost');
    Route::get('manage/users/', [App\Http\Controllers\AdminController::class,'manageusers'])->name('manage.users');
    Route::post('create/posts', [App\Http\Controllers\PostController::class, 'store'])->name('store');
    Route::get('manage/posts', [App\Http\Controllers\AdminController::class, 'manageposts'])->name('manage.posts');
    Route::get('/edit/post/{id}', [App\Http\Controllers\AdminController::class, 'editpost'])->name('edit.post');
    Route::delete('delete/post/{id}', [App\Http\Controllers\AdminController::class, 'deletepost'])->name('deletepost');
    Route::get('manage/user/{id}',[App\Http\Controllers\AdminController::class, 'manageuser'])->name('manage.user');
    Route::delete('delete/user/{id}',[App\Http\Controllers\AdminController::class,'deleteuser'])->name('deleteuser');
    Route::get('search/user/', [App\Http\Controllers\AdminController::class ,'search'])->name('admin.search');



});


Route::prefix('profile')->middleware('auth')->group(function () {
Route::get('/edit', [App\Http\Controllers\UserController::class ,'edit'])->name('users.edit');
Route::post('edit/{id}', [App\Http\Controllers\UserController::class , 'update'])->name('users.update');
Route::get('/', [App\Http\Controllers\UserController::class ,'profile'])->name('profile');
Route::post('/add/picture', [App\Http\Controllers\UserController::class ,'addprofilepicture'])->name('addprofilepicture');
Route::get('/add/pic', [App\Http\Controllers\UserController::class ,'addpic'])->name('addpic');

});

Route::get('/aboutus', [App\Http\Controllers\HomeController::class ,'aboutus'])->name('aboutus');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class ,'show'])->name('show');
Route::post('addcoment/',[App\Http\Controllers\PostController::class,'storecomment'])->name('storecomment');
Route::delete('/comments/{id}',[App\Http\Controllers\PostController::class,'destroy'])->name('comments.destroy');


Route::get('/search', [App\Http\Controllers\SearchController::class,'search'])->name('search');
Route::get('/search-form', function () {
    return view('search-form');
});
Route::get('/visitors', [App\Http\Controllers\VisitorController::class, 'index'])->name('visitors.index');







