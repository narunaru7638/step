<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProgress extends FormRequest
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
            'working_time' => 'nullable|integer|max:255|min:1',
            'report' => 'nullable|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'working_time' => '作業時間',
            'report' => '気付いたこと・学んだこと',
        ];
    }


}
