<?php

namespace App\Interfaces\Http\Requests;

use App\Domain\Product\Enums\ProductTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'sku' => ['required', 'string', 'unique:products,sku'],
            'price' => ['required', 'numeric', 'min:0'],
            'type' => ['required', new Enum(ProductTypeEnum::class)],
            'attributes' => ['nullable', 'array'],
        ];
    }
}
