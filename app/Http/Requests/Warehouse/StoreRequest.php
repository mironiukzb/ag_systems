<?php

namespace App\Http\Requests\Warehouse;

use App\Models\Warehouse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiFormRequest;

class StoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function insert(): JsonResponse
    {
        return response()->json(Warehouse::create([
            "name" => $this->name,
            "code" => $this->code
        ]));
    }
}
