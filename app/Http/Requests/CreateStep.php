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
            'step_title' => 'required|max:255',
            'step_content' => 'required|max:255',
            'step_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'step_category' => 'integer|between:1,7',

            'childstep1_title' => 'required|max:255',
            'childstep1_content' => 'required|max:255',
            'childstep1_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep1_required-time' => 'required|integer|max:255|min:1',

            'childstep2_title' => 'required_with:childstep3_title,childstep3_content,childstep3_img,childstep3_required-time|required_if:number_of_childstep,2,3,4,5,6,7,8,9,10|max:255',
            'childstep2_content' => 'required_with:childstep3_title,childstep3_content,childstep3_img,childstep3_required-time|required_if:number_of_childstep,2,3,4,5,6,7,8,9,10|max:255',
            'childstep2_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep2_required-time' => 'required_with:childstep3_title,childstep3_content,childstep3_img,childstep3_required-time|required_if:number_of_childstep,2,3,4,5,6,7,8,9,10|integer|max:255|min:1',

            'childstep3_title' => 'required_with:childstep4_title,childstep4_content,childstep4_img,childstep4_required-time|required_if:number_of_childstep,3,4,5,6,7,8,9,10|max:255',
            'childstep3_content' => 'required_with:childstep4_title,childstep4_content,childstep4_img,childstep4_required-time|required_if:number_of_childstep,3,4,5,6,7,8,9,10|max:255',
            'childstep3_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep3_required-time' => 'required_with:childstep4_title,childstep4_content,childstep4_img,childstep4_required-time|required_if:number_of_childstep,3,4,5,6,7,8,9,10|integer|max:255|min:1',

            'childstep4_title' => 'required_with:childstep5_title,childstep5_content,childstep5_img,childstep5_required-time|required_if:number_of_childstep,4,5,6,7,8,9,10|max:255',
            'childstep4_content' => 'required_with:childstep5_title,childstep5_content,childstep5_img,childstep5_required-time|required_if:number_of_childstep,4,5,6,7,8,9,10|max:255',
            'childstep4_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep4_required-time' => 'required_with:childstep5_title,childstep5_content,childstep5_img,childstep5_required-time|required_if:number_of_childstep,4,5,6,7,8,9,10|integer|max:255|min:1',

            'childstep5_title' => 'required_with:childstep6_title,childstep6_content,childstep6_img,childstep6_required-time|required_if:number_of_childstep,5,6,7,8,9,10|max:255',
            'childstep5_content' => 'required_with:childstep6_title,childstep6_content,childstep6_img,childstep6_required-time|required_if:number_of_childstep,5,6,7,8,9,10|max:255',
            'childstep5_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep5_required-time' => 'required_with:childstep6_title,childstep6_content,childstep6_img,childstep6_required-time|required_if:number_of_childstep,5,6,7,8,9,10|integer|max:255|min:1',

            'childstep6_title' => 'required_with:childstep7_title,childstep7_content,childstep7_img,childstep7_required-time|required_if:number_of_childstep,6,7,8,9,10|max:255',
            'childstep6_content' => 'required_with:childstep7_title,childstep7_content,childstep7_img,childstep7_required-time|required_if:number_of_childstep,6,7,8,9,10|max:255',
            'childstep6_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep6_required-time' => 'required_with:childstep7_title,childstep7_content,childstep7_img,childstep7_required-time|required_if:number_of_childstep,6,7,8,9,10|integer|max:255|min:1',

            'childstep7_title' => 'required_with:childstep8_title,childstep8_content,childstep8_img,childstep8_required-time|required_if:number_of_childstep,7,8,9,10|max:255',
            'childstep7_content' => 'required_with:childstep8_title,childstep8_content,childstep8_img,childstep8_required-time|required_if:number_of_childstep,7,8,9,10|max:255',
            'childstep7_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep7_required-time' => 'required_with:childstep8_title,childstep8_content,childstep8_img,childstep8_required-time|required_if:number_of_childstep,7,8,9,10|integer|max:255|min:1',

            'childstep8_title' => 'required_with:childstep9_title,childstep9_content,childstep9_img,childstep9_required-time|required_if:number_of_childstep,8,9,10|max:255',
            'childstep8_content' => 'required_with:childstep9_title,childstep9_content,childstep9_img,childstep9_required-time|required_if:number_of_childstep,8,9,10|max:255',
            'childstep8_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep8_required-time' => 'required_with:childstep9_title,childstep9_content,childstep9_img,childstep9_required-time|required_if:number_of_childstep,8,9,10|integer|max:255|min:1',

            'childstep9_title' => 'required_with:childstep10_title,childstep10_content,childstep10_img,childstep10_required-time|required_if:number_of_childstep,9,10|max:255',
            'childstep9_content' => 'required_with:childstep10_title,childstep10_content,childstep10_img,childstep10_required-time|required_if:number_of_childstep,9,10|max:255',
            'childstep9_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep9_required-time' => 'required_with:childstep10_title,childstep10_content,childstep10_img,childstep10_required-time|required_if:number_of_childstep,9,10|integer|max:255|min:1',

            'childstep10_title' => 'required_if:number_of_childstep,10|max:255',
            'childstep10_content' => 'required_if:number_of_childstep,10|max:255',
            'childstep10_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'childstep10_required-time' => 'required_if:number_of_childstep,10|integer|max:255|min:1',


            'number_of_childstep' => 'integer|max:10|min:1'

        ];

    }

    public function attributes()
    {
        return [
            'step_title' => 'STEP名',
            'step_content' => 'STEP説明',
            'step_img' => 'STEPイメージ画像',
            'step_category' => 'カテゴリー',

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

            'childstep4_title' => 'STEP4名',
            'childstep4_content' => 'STEP4説明',
            'childstep4_img' => 'STEP4イメージ画像',
            'childstep4_required-time' => 'STEP4所要時間',

            'childstep5_title' => 'STEP5名',
            'childstep5_content' => 'STEP5説明',
            'childstep5_img' => 'STEP5イメージ画像',
            'childstep5_required-time' => 'STEP5所要時間',

            'childstep6_title' => 'STEP6名',
            'childstep6_content' => 'STEP6説明',
            'childstep6_img' => 'STEP6イメージ画像',
            'childstep6_required-time' => 'STEP6所要時間',

            'childstep7_title' => 'STEP7名',
            'childstep7_content' => 'STEP7説明',
            'childstep7_img' => 'STEP7イメージ画像',
            'childstep7_required-time' => 'STEP7所要時間',

            'childstep8_title' => 'STEP8名',
            'childstep8_content' => 'STEP8説明',
            'childstep8_img' => 'STEP8イメージ画像',
            'childstep8_required-time' => 'STEP8所要時間',

            'childstep9_title' => 'STEP9名',
            'childstep9_content' => 'STEP9説明',
            'childstep9_img' => 'STEP9イメージ画像',
            'childstep9_required-time' => 'STEP9所要時間',

            'childstep10_title' => 'STEP10名',
            'childstep10_content' => 'STEP10説明',
            'childstep10_img' => 'STEP10イメージ画像',
            'childstep10_required-time' => 'STEP10所要時間',

            'number_of_childstep' => '子STEPの数'


        ];
    }



}
