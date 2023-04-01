<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cosmetic;
use Carbon\Carbon;

class AuthController extends Controller
{

    /**
     * @return View 
     */
    public function show_login(){
        return view('user.login');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest;
     */
    public function login(LoginFormRequest $request){
        
        $credentials = $request->only('mail','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home')->with('login_success','ログインに成功しました。');
        }
        return back()->with('login_error','メールアドレスもしくはパスワードが違います.');
    }


    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();//ログアウト
        $request->session()->invalidate();//セッション削除
        $request->session()->regenerateToken();//セッション再構成
        return redirect()->route('show_login')->with('logout','ログアウトしました。');
    }


}
