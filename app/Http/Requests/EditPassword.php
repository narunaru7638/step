<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditPassword extends FormRequest
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
            'password_old' => 'required|string|min:8|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'password_old' => '古いパスワード',
            'password' => '新しいパスワード',
            'password_confirmation' => '新しいパスワード(再入力)'
        ];
    }
}
