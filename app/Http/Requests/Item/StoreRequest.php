<?php

namespace App\Http\Requests\Item;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiFormRequest;

class StoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            
        ];
    }

    public function insert(): JsonResponse
    {
        return response()->json(Item::create([
            "name" => $this->name,
            "price" => $this->price
        ]));
    }
}
