<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Socialite;// 追加！

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        $post = Post::orderBy('created_at','DESC')->simplePaginate(10);

        if($request->session()->has("github_token")){
            $token = $request->session()->get('github_token', null);
            $github_user = Socialite::driver('github')->userFromToken($token);
//            $user = User::where('github_id',$github_user->user['login'] )->first();
            $user = Auth::user();
            return view('home', [
                'nickname' => $github_user->nickname,
                'token' => $token,
                'avatar'=> $github_user->avatar,
                'post' => $post,
                'user' => $user,
            ]);
        }
        
        return view('home', [
            'post' => $post,
        ]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public');
            return view('home')->with('filename', basename($path));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}