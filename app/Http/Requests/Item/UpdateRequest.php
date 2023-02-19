<?php

namespace App\Http\Requests\Item;

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
        return $this->item->update([
            "name" => $this->get("name", $this->item->name),
            "price" => $this->get("price", $this->item->price),
        ]) ? response()->json($this->item, 204) 
        : response()->json("Something went wrong.", 500);
    }
}
