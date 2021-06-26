<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FlashLog;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        if (($request->name && $request->email && $request->password) != null ) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->save();

            return redirect()->route('allPosts')->with('success', 'Su cuenta se actualizó con éxito');
        } else {
        return redirect()->back()->with('warning', 'Ingrese todos los datos');
        }
    }

    public function deleteUser()
    {
        $id = Auth::id();
        $user = User::where('_id', '=', $id)->delete();
        $posts = Post::where('user_id', '=', $id)->delete();
        return redirect()->route('allPosts');
    }
}
