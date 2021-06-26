<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function(){
    return redirect('/posts');
});

Route::get('/home', function(){
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index'])->name('allPosts');
Route::view('/posts/create', 'posts.create');
Route::post('/posts/create', [PostController::class, 'store']); 
Route::get('/posts/myPosts', [PostController::class, 'userPosts'])->name('myPosts');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/posts/myPosts/{id}', [PostController::class, 'destroy'])->name('destroyPost');
Route::view('/user/count', 'users.count');
Route::post('/user/count/{id}', [UserController::class, 'editUser'])->name('editUser');
Route::get('/user/delcount', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get("/notificaciones",CommentController::class, "notificaciones");

Route::get('/today', [PostController::class, 'today']);



Auth::routes();

Route::get(
    '/home', 
    [App\Http\Controllers\PostController::class, 'index'])->name('home');
    