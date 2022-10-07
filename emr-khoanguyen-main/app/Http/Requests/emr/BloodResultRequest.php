<?php

namespace App\Http\Requests\emr;

use Illuminate\Foundation\Http\FormRequest;

class BloodResultRequest extends FormRequest
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
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            'name_subclinical_service' => ['required'],
            'url' => ['required', 'max:255'],
            'comment' => ['required'],
            // 'glu' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'ure' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'rbc' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'hb' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'hct' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'mcv' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'mch' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'wbc' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'neut' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'lym' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'mono' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'plt' => ['bail', 'required', 'numeric', 'gte:0'],
            // 'blood_group' => ['required'],
            // 'blood_type' => ['required'],
        ];
    }
}
