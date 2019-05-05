<?php

namespace App\Http\Controllers;

use App\User;
use App\Like;
use App\Post;
use Illuminate\Http\Request;
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
        $postid = $request->input('post');
        $users = DB::table('likes')
                ->join('posts', 'likes.post_id', '=', 'posts.id')
                ->join('users', 'users.id', '=', 'likes.user_id')
                ->select('users.id','users.github_id','users.avatar_path')
                ->where('posts.id','=',$postid)
                ->get();
        return view('liker')->with('users', $users);
    }

    public function processlike(Request $request){
        
    }

}