<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'mail'=>'required',
            'password'=>'required | min:6 | confirmed',
        ];
    }

    public function attributes(){
        return [
            'name'=>'お名前',
            'mail'=>'メール',
            'password'=>'パスワード',
        ];
    }

    public function messages(){
        return [
            'name.required'=>':attributeを入力してください',
            'mail.required'=>':attributeを入力してください',
            'password.required'=>':attributeを入力してください',
            'password.min'=>':attributeを最低6文字以上で入力してくだい',
            'password.confirmed'=>':attributeが間違ってます',
        ];
    }
}
