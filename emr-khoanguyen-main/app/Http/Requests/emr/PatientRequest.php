<?php

namespace App\Http\Requests\emr;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class PatientRequest extends FormRequest
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
            'full_name' => ['required', 'max:255'],
            'email' => ['bail', 'required', "email", 'unique:patients,email,'. $this->id .',id'],
            'phone_patient' => ['bail', 'required', 'numeric'],
            'identity_number' => ['bail', 'required', 'min:12', 'max:12', 'unique:patients,identity_number,'. $this->id .',id'],
            'dob' => ['required'],
            'city_id' => ['required'],
            'district_id' => ['required'],
            'ward_id' => ['required']
        ];
    }

    // public function response(array $errors)
    // {
    //     if ($this->expectsJson()) {
    //         return new JsonResponse($errors, 200);
    //     }
    // }
}
