<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'unique:products', 'max:100'],
            'description' => ['nullable', 'max:255'],
            'price' => ['nullable', 'decimal:2'],
            'image' => ['nullable', 'image', 'max:300'],
            'tags' => ['nullable', 'exists:tags,id']
        ];
    }
}
