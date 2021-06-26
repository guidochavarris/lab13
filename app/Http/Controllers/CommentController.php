<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestNotification;

use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required:max:250',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->content = $request->get('content');

        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        $id_user_post = $post->user_id;
        $title=$post->title;
        User::find($id_user_post)->notify(new TestNotification($comment,$title));

        return redirect()->route('post', ['id' => $request->get('post_id')]);
    }

    public function index()
    {
        $postNotifications =auth()->user()->unreadNotifications();
        return view("post.notification", compact("postNotifications"));
    }
    public function notificaciones(Request $request){
        $user = $request->user();
        $notificaciones = $user->unreadNotifications;
        return view('posts.notification', ['notificaciones' => $notificaciones]);
    }

    
}
