<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStep extends FormRequest
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
            'step_content' => 'required|max:255',
            'childstep1_content' => 'required|max:255',
            'childstep2_content' => 'required_with:childstep3_content|required_if:number_of_childstep,2,3,4,5,6,7,8,9,10|max:255',
            'childstep3_content' => 'required_with:childstep4_content|required_if:number_of_childstep,3,4,5,6,7,8,9,10|max:255',
            'childstep4_content' => 'required_with:childstep5_content|required_if:number_of_childstep,4,5,6,7,8,9,10|max:255',
            'childstep5_content' => 'required_with:childstep6_content|required_if:number_of_childstep,5,6,7,8,9,10|max:255',
            'childstep6_content' => 'required_with:childstep7_content|required_if:number_of_childstep,6,7,8,9,10|max:255',
            'childstep7_content' => 'required_with:childstep8_content|required_if:number_of_childstep,7,8,9,10|max:255',
            'childstep8_content' => 'required_with:childstep9_content|required_if:number_of_childstep,8,9,10|max:255',
            'childstep9_content' => 'required_with:childstep10_content|required_if:number_of_childstep,9,10|max:255',
            'childstep10_content' => 'required_if:number_of_childstep,10|max:255',

            'number_of_childstep' => 'integer|max:10|min:1'


        ];
    }

    public function attributes()
    {
        return [
            'step_content' => 'STEP説明',
            'childstep1_content' => '子STEP1説明',
            'childstep2_content' => '子STEP2説明',
            'childstep3_content' => '子STEP3説明',
            'childstep4_content' => '子STEP4説明',
            'childstep5_content' => '子STEP5説明',
            'childstep6_content' => '子STEP6説明',
            'childstep7_content' => '子STEP7説明',
            'childstep8_content' => '子STEP8説明',
            'childstep9_content' => '子STEP9説明',
            'childstep10_content' => '子STEP10説明',

            'number_of_childstep' => '子STEPの数'


        ];
    }

}
