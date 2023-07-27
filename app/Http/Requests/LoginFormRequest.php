<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email'=>'required | max:255',
            'password'=>'required',
        ];
    }
    public function attributes(){
        return [
            'email'=>'メール',
            'password'=>'パスワード'
        ];
    }

    public function messages(){
        return [
            'email.required'=>':attributeを入力してくさい',
            'password.required'=>':attributeを入力してくだい',
        ];
    }
}