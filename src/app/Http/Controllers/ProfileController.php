<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;// 追加！

class ProfileController extends Controller
{
    public function index(Request $request){
        $nickname = $request->input('user');
        $user = User::where('github_id', $nickname)->first();
        $post = $user->posts->sortByDesc('created_at');
        $like = 0;
        foreach ($post as $p){
            $like = $like + $p->likes->count();
        }

        return view('profile',[
            'nickname'=>$nickname,
            'user'=>$user,
            'post'=>$post,
            'like'=>$like,
            'avatar'=>$user->avatar_path,
        ]);
    }
}