<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Contact;
use App\Models\Cosmetic;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_admin_login()
    {
        return view('admin.admin_login');
    }

    public function admin_login(Request $request)
    {


        $credentials = $request->only(['mail', 'password']);

        if (Auth::guard('admins')->attempt($credentials)) {
            // ログインしたら管理画面トップにリダイレクト
            return redirect()->route('admin_top')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->with('login','ログインに失敗しました');
    }

    public function admin_top()
    {
        return view('admin.admin_top');
    }

    public function admin_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ログアウトしたらログインフォームにリダイレクト
        return redirect()->route('show_admin_login')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }

    public function users_list()
    {
        $users = User::paginate(10);

        return view('admin.users_list',['users' => $users]);
    }

    //ユーザ削除
    public function admin_user_delete($id){

        $user_id = $id;
        Cosmetic::where('user_id','=',$user_id);
        User::destroy($id);

        return redirect()->route('users_list')->with('delete_success','削除しました。');
    }

    //問い合わせ一覧
    public function contact_list()
    {
        $contacts = Contact::paginate(10);

        return view('admin.contact_list',['contacts' => $contacts]);
    }

    //問い合わせ詳細
    public function contact_detail($id){

        $contact = Contact::find($id);

        return view('admin.contact_detail',['contact' => $contact]);
    }

    //ユーザ削除
    public function contact_delete($id){

        Contact::destroy($id);

        return redirect()->route('contact_list')->with('delete_success','削除しました。');
    }
}

