<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => [],
            'address1' => ['required', 'max:255'],
            'address2' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'state' => ['max:45'],
            'zipcode' => ['required'],
            'country_code' => ['required']
        ];
    }
}
