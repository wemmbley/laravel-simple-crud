<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['string', 'max:255', Rule::exists('companies', 'id')],
            'email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(Company::class)->ignore($this->user()->id)],
            'phone' => ['int', 'max:13'],
        ];
    }
}
