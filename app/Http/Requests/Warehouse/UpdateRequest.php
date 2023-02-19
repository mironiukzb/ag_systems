<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiFormRequest;

class UpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            
        ];
    }

    public function actualize(): JsonResponse
    {
        return $this->warehouse->update([
            "name" => $this->get("name", $this->item->name),
            "code" => $this->get("code", $this->item->code),
        ]) ? response()->json($this->warehouse, 204) 
        : response()->json("Something went wrong.", 500);
    }
}
