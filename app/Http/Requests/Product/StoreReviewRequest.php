<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiRequest;

class StoreReviewRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
          'title'=>['required','string'],
          'rating'=>['required','integer','min:1','max:5'],
        ];
    }
}
