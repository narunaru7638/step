<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStep extends FormRequest
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
            //
            'step_title' => 'required|max:255',
            'step_content' => 'required|max:255',
            'step_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'step_category' => 'integer|between:1,7',
            'step_required-time' => 'nullable|integer|max:255',

            'childstep1_title' => 'required|max:255',
            'childstep1_content' => 'required|max:255',
            'childstep1_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep1_required-time' => 'nullable|integer|max:255',

            'childstep2_title' => 'required|max:255',
            'childstep2_content' => 'required|max:255',
            'childstep2_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep2_required-time' => 'nullable|integer|max:255',

            'childstep3_title' => 'required|max:255',
            'childstep3_content' => 'required|max:255',
            'childstep3_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep3_required-time' => 'nullable|integer|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'step_title' => 'STEP名',
            'step_content' => 'STEP説明',
            'step_img' => 'STEPイメージ画像',
            'step_category' => 'カテゴリー',
            'step_required-time' => '所要時間',

            'childstep1_title' => 'STEP1名',
            'childstep1_content' => 'STEP1説明',
            'childstep1_img' => 'STEP1イメージ画像',
            'childstep1_required-time' => 'STEP1所要時間',

            'childstep2_title' => 'STEP2名',
            'childstep2_content' => 'STEP2説明',
            'childstep2_img' => 'STEP2イメージ画像',
            'childstep2_required-time' => 'STEP2所要時間',

            'childstep3_title' => 'STEP3名',
            'childstep3_content' => 'STEP3説明',
            'childstep3_img' => 'STEP3イメージ画像',
            'childstep3_required-time' => 'STEP3所要時間',

        ];
    }
}
