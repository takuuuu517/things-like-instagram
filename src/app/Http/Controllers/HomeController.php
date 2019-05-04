<?php

namespace App\Http\Controllers;
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
        $token = $request->session()->get('github_token', null);
        $github_user = Socialite::driver('github')->userFromToken($token);
//        return view('home');

        return view('home', [
            'nickname' => $github_user->nickname,
            'token' => $token,
            'avatar'=> $github_user->avatar,
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