<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => ['nullable', 'email:rfc,dns', Rule::unique('employees' ,'email')->ignore($this->id)],
            'phone' => ['nullable', 'numeric', Rule::unique('employees','phone')->ignore($this->id)],
            'occupation' => 'nullable|string|max:190',



        ];
    }
}
