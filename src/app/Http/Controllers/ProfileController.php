<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Socialite;// 追加！

class ProfileController extends Controller
{
    public function index(Request $request){
//        $token = $request->session()->get('github_token', null);
//        $github_user = Socialite::driver('github')->userFromToken($token);

        $nuckname = $request->input('user');
        $user = User::where('github_id', $nuckname)->first();
//        $user = User::all();
        $post = $user->posts;
        $like = 0;
        foreach ($post as $p){
            $like = $like + $p->likes->count();
        }
//        $like = $post->likes;


//        $user = User::where('github_id',$github_user->user['login'] )->first();


        return view('profile',[
            'nickname'=>$nuckname,
            'user'=>$user,
            'post'=>$post,
            'like'=>$like,
            'avatar'=>$user->avatar_path,
//            'avatar'=> $github_user->avatar,
        ]);
    }
}