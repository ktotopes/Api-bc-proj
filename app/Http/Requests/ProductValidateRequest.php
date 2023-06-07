<?php

namespace App\Http\Requests;

use App\Rules\MinMax;
use Illuminate\Foundation\Http\FormRequest;

class ProductValidateRequest extends FormRequest
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
            'filter.category_id' => ['nullable', 'numeric', 'exists:categories,id'],
            'filter.min_price' => ['nullable', 'numeric', 'min:0', 'max:1000000', new MinMax],
            'filter.max_price' => ['nullable', 'numeric', 'min:0', 'max:1000000'],
            'filter.properties' => ['nullable', 'string', 'max:255'],
        ];
    }
}
