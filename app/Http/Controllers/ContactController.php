<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    //お問い合わせ
    public function show_contact(){
        return view('contact.contact');
    }

    public function contact_confirm(Request $request){
        //バリデーション記述追加
        $request->validate([
            'name' => 'required|max:10',
            'mail' => 'required|email',
            'body' => 'required',
        ],
        [
            'name.required' => '氏名は必須入力です。10文字以内でご入力ください。',
            'name.max' => '氏名は必須入力です。10文字以内でご入力ください。',
            'mail.required' => 'メールアドレスは正しくご入力ください。',
            'mail.email' => 'メールアドレスは正しくご入力ください。',
            'body.required' => 'お問い合わせ内容は必須入力です。',
        ]);
        $inputs = $request->all();
        return view('contact.contact_confirm',['inputs' => $inputs]);
    }
    public function contact_complete(Request $request){
        $confirm = $request->input('submit');
        $inputs = $request->except('submit','_token');

        if($confirm != 'send'){
            return redirect()->route('contact')->withInput($inputs);
        }else{
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->mail = $request->mail;
            $contact->body = $request->body;
            $contact->save();
            return view('contact.contact_complete');
        }  
    }

}
