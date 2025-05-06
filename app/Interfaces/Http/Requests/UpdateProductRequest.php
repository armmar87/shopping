<?php

namespace App\Interfaces\Http\Requests;

use App\Domain\Product\DTOs\ProductDTO;
use App\Domain\Product\Enums\ProductTypeEnum;
use App\Http\Requests\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'currency' => 'required|string|size:3',
            'sku' => [
                'required',
                'string',
                Rule::unique('products', 'sku_code')->ignore($this->route('id')),
            ],
            'type' => ['required', new Enum(ProductTypeEnum::class)],
            'attributes' => ['nullable', 'array'],
        ];
    }
}
