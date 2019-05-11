<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function destroy($id){

        Post::find($id)->delete();
        return redirect('/home');
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
                'max:200',
            ]
        ]);

        if ($request->file('file')->isValid([]) ) {
            $path = $request->file->store('public');
            $post = new Post;
            $post->user_id = $user->id;
            $post->picture_path = basename($path);
            $post->caption = $request->input('caption');
            $post->save();

            return redirect('home');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}