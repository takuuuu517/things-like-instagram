<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Socialite;// 追加！

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has("github_token")){
            return view('post');
        }
        return redirect('/');
    }

    public function upload(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $github_user = Socialite::driver('github')->userFromToken($token);
        $user = User::where('github_id',$github_user->user['login'] )->first();


        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png,gif',
                'file' => 'max:60000',
            ],
            'caption' => [
                'required',
                'max:200',
            ]
        ]);

        if ($request->file('file')->isValid([]) ) {
            $path = $request->file->store('public');
            $post = new Post;
//            $app_user->github_id = $github_user->user['login'];
            $post->user_id = $user->id;
            $post->picture_path = $path;
            $post->caption = $request->input('caption');
            $post->save();


            return view('home')->with('filename', basename($path));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}