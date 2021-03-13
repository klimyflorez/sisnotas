<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'identification' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'identification' => __('models/course.fillable.identification'),
            'first_name' => __('models/course.fillable.first_name'),
            'last_name' => __('models/course.fillable.last_name'),
            'phone' => __('models/course.fillable.phone'),
        ];
    }
}
