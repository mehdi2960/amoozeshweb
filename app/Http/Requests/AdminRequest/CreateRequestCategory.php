<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestCategory extends FormRequest
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
            'title_fa' => 'required|unique:categories,title_fa',
            'title_en' => 'nullable|unique:categories,title_en',
            'propertyGroups' => 'nullable|exists:property_groups,id',
        ];
    }
}
