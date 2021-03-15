<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'inscription_id' => 'required',
            'subject_id' => 'required',
            'value' => 'required',
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
            'inscription_id' => __('models/note.fillable.student'),
            'subject_id' => __('models/note.fillable.subject'),
            'value' => __('models/note.fillable.value'),
        ];
    }
}
