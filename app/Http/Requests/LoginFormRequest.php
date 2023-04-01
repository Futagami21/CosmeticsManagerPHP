<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mail' => 'required|email|max:255',
            'password' => 'required',
        ];
    //     ],
    //     [
    //         'mail.required' => 'メールアドレスを入力してください。',
    //         'mail.email' => 'メールアドレスは正しくご入力ください。',
    //         'mail.max' => 'メールアドレスは正しくご入力ください。',
    //         'password.required' => 'パスワードを入力してください',
    //     ];
    }
}
