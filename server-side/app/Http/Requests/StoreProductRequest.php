<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:2000'],
            'slug' => ['required', 'max:2000'],
            'image' => ['max:2000'],
            'image_mime' => [],
            'image_size' => [],
            'description' => [],
            'price' => ['required', 'max:10']
        ];
    }
}
