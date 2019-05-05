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
//        dd($postid);
//        $user = User::where('github_id', $nuckname)->first();

//        $likes = Like::where('post_id', $postid);
        $likes = Like::all()->where('post_id', $postid);

        $users = DB::table('likes')
                ->join('posts', 'likes.post_id', '=', 'posts.id')
                ->join('users', 'users.id', '=', 'likes.user_id')
                ->select('users.id','users.github_id','users.avatar_path')
                ->where('posts.id','=',$postid)
                ->get();

//        foreach ($likes as $l){
//            dd($l->post_id);
//        }



//        dd($likes->user_id);


        return view('liker')->with('users', $users);

    }

}