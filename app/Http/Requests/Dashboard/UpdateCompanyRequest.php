<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:190',
           'email' => "nullable|email|unique:companies,email,".request()->segment(3),
           // 'email' => ['nullable', 'email:rfc,dns', Rule::unique('companies')->ignore($this->id)],
            'website' => 'nullable|url',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=100,height=100',//|dimensions:width=100,height=100
            'revenue' => 'nullable|integer',
        ];
    }
}
