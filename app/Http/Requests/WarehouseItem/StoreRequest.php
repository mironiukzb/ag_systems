<?php

namespace App\Http\Requests\WarehouseItem;

use App\Models\WarehouseItem;
use App\Http\Requests\ApiFormRequest;
use Illuminate\Http\JsonResponse;

class StoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            "warehouse_id" => ["required", "integer", "exists:warehouses,id"],
            "item_id" => ["required", "integer", "exists:items,id"],
            "amount" => ["required", "integer"]
        ];
    }

    public function insert(): JsonResponse
    {
        return response()->json(WarehouseItem::create([
            "warehouse_id" => $this->warehouse_id,
            "item_id" => $this->item_id,
            "amount" => $this->amount
        ]));
    }
}
