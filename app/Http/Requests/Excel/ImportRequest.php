<?php

namespace App\Http\Requests\Excel;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class ImportRequest extends FormRequest
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

        return RuleFactory::make([
            'file' => 'required|mimes:xlsx' //a required, max 10000kb, doc or docx file
            // '%name%' => ['required', 'string', 'max:255'],
        ]);
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('cities.attributes'));
    }
}
