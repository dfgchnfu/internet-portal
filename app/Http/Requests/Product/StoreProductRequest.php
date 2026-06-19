<?php

namespace App\Http\Requests\Product;

use App\Enums\ProductStatus;
use App\Http\Requests\ApiRequest;
use App\Models\Product;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProductRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'description'=>['string'],
            'count'=>['required','integer','min:0','max:1000'],
            'price'=>['required','numeric','min:1','max:100000'],
            'status'=>['required',new Enum(ProductStatus::class)],
            'images.*'=>['image']
        ];
    }
}
