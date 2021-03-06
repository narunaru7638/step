<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class EditProfile extends FormRequest
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
            'name' => 'required|string|max:255|unique:users,name,'.Auth::user()->name.',name',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->email.',email',
            'profile' => 'nullable|string|max:255',
            'pic_icon' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',


        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザネーム',
            'email' => 'emailアドレス',
            'profile' => '自己紹介文',
            'pic_icon' => 'プロフィール画像'
        ];
    }
}
