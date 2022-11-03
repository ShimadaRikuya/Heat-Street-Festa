<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name'   => 'required|max:50',
            'email'  => 'nullable|email:strict,dns|max:255|',
            'phone'  => 'nullable|numeric|regex:/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/',
        ];
    }

    public function messages()
    {
        return [
            // チーム名
            'name.required' => 'チーム名を入力してください',
            'name.max' => 'チーム名は50文字以下で入力してください',
            // 問い合わせメールアドレス
            'email.email' => '有効なメールアドレスを入力してください',
            'email.max' => 'メールアドレスは255文字以下で入力してくだい',
            // 問い合わせ連絡先
            'phone.numeric' => '半角英数字で入力してください',
            'phone.regex' => '無効な電話番号です',
        ];
    }
}
