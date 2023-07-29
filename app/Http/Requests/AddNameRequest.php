<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNameRequest extends FormRequest
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
        ];
    }

    public function attributes(){
        return [
            'name'=>'単語',
        ];
    }

    public function messages(){
        return [
            'name.required'=>':attributeを入力してください',
        ];
    }
}
