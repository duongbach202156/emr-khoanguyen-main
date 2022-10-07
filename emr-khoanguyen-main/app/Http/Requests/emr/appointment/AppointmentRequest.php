<?php

namespace App\Http\Requests\emr\appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name' => ['required', 'max:255',],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:10'],
            'date' => ['required'],
            'time' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
            'services' => ['required']
        ];
    }
}
