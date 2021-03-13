<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        // dd($this->all() , Rule::in(config('permission.supported')) );
        return RuleFactory::make([
            '%name%' => ['required', 'string', 'max:255'],
            "permissions"    => "required|array|min:1",
            'permissions.*' => ['required', 'distinct', Rule::in(config('permission.supported'))],
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('roles.attributes'));
    }
}
