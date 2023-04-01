<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
            'mail' => 'required|email:filter|exists:users,mail'
        ];
    }

    /**
     * バリデーションメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [
            'mail.required' => ':attributeを入力してください',
            'mail.email' => '正しいメールアドレスの形式で入力してください',
            'mail.exists' => '登録している:attributeを入力してください'
        ];
    }
    /**
     * attribute名をカスタマイズ
     * @return array
     */
    public function attributes()
    {
        return [
            'mail' => 'メールアドレス',
        ];
    }
}
