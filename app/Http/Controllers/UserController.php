<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //新規登録
    public function show_signup(){
        return view('user.signup');
    }

    public function signup_confirm(Request $request){

        //バリデーション記述追加
        $request->validate([
            'name' => 'required|max:10',
            'mail' => 'required|email|unique:users',
            'password' => 'required|confirmed|regex:/^[0-9a-zA-z-_]{8,32}$/',
            'password_confirmation' => 'required',
        ],
        [
            'name.required' => '氏名は必須入力です。10文字以内でご入力ください。',
            'name.max' => '氏名は必須入力です。10文字以内でご入力ください。',
            'mail.required' => 'メールアドレスは正しくご入力ください。',
            'mail.email' => 'メールアドレスは正しくご入力ください。',
            'mail.unique' => 'このメールアドレスは既に使用されています。',
            'password.required' => 'パスワードは必須入力です。',
            'password.regex' => 'パスワードは半角英数字とハイフンとアンダーバーのみで8文字以上32文字以内で入力してください。',
            'password_confirmation.required' => '確認用パスワードもご入力ください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ]);

        $inputs = $request->all();
        return view('user.signup_confirm',['inputs' => $inputs]);
    }
    public function signup(Request $request){

        $confirm = $request->input('submit');
        $inputs = $request->except('submit','_token');

        if($confirm != 'send'){
            return redirect()->route('signup')->withInput($inputs);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->mail = $request->mail;
            $user->password = Hash::make($request->password);
            $user->save();

            return view('user.signup_complete',['inputs' => $inputs]);
            
        }
    }

    //マイページ表示
    public function mypage(){
        return view('user.mypage');
    }

    //ユーザ編集画面表示
    public function show_user_edit(){
        return view('user.user_edit');
    }

    //ユーザ編集
    public function user_edit(Request $request,$id){

        $userId = Auth::id();

        $request->validate([
            'name' => 'required|max:10',
            'mail' => 'required|email|unique:users,mail,'.$userId.',id',
        ],
        [
            'name.required' => '氏名は必須入力です。10文字以内でご入力ください。',
            'name.max' => '氏名は必須入力です。10文字以内でご入力ください。',
            'mail.required' => 'メールアドレスは正しくご入力ください。',
            'mail.email' => 'メールアドレスは正しくご入力ください。',
            'mail.unique' => 'このメールアドレスは既に使用されています。',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->mail = $request->mail;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('show_user_edit',$user->id)->with('edit_success','編集完了しました。');
    }

    //ユーザ削除画面表示
    public function show_user_delete(){
        return view('user.user_delete');
    }

    public function user_delete_complete(Request $request){

        $userId = Auth::id();
        User::destroy($userId);

        return view('user.user_delete_complete');
    }

}
