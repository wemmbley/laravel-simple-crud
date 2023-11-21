<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['dimensions:min_width=100,min_height=100'],
            'website' => ['string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(Company::class)->ignore($this->user()->id)],
        ];
    }
}
