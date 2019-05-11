<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LikerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postId = $request->input('post');
        $users = DB::table('likes')
                ->join('posts', 'likes.post_id', '=', 'posts.id')
                ->join('users', 'users.id', '=', 'likes.user_id')
                ->select('users.id','users.github_id','users.avatar_path')
                ->where('posts.id','=',$postId)
                ->get();
        return view('liker')->with('users', $users);
    }

    public function processlike(Request $request){
        $post_id = $request['post_id'];
        $user_id = $request['user_id'];

        $user = User::find($user_id);
        $like = $user->likes()->where('post_id', $post_id)->first();

        if($like){
            $like->delete();
        }
        else{
            $like = new Like();
            $like->user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();
        }
        return null;
    }

}