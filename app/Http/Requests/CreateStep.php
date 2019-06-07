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
            'childstep1_title' => 'required|max:255',
            'childstep1_content' => 'required|max:255',
            'childstep2_title' => 'required|max:255',
            'childstep2_content' => 'required|max:255',
            'childstep3_title' => 'required|max:255',
            'childstep3_content' => 'required|max:255',



        ];
    }

    public function attributes()
    {
        return [
            'step_title' => 'STEP名',
            'step_content' => 'STEP詳細',
            'childstep_title_1' => '子STEP1名',
            'childstep_content_1' => '子STEP1詳細',
            'childstep_title_2' => '子STEP2名',
            'childstep_content_2' => '子STEP2詳細',
            'childstep_title_3' => '子STEP3名',
            'childstep_content_3' => '子STEP3詳細',

        ];
    }
}
