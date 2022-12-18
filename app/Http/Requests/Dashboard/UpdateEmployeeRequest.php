<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'company_id' => 'required|integer|exists:companies,id',
            'email' => "nullable|email:rfc,dns|unique:employees,email," . request()->segment(3),
            'phone' => "nullable|numeric|unique:employees,phone," . request()->segment(3),
            'occupation' => 'nullable|string|max:190',
        ];
    }
}
