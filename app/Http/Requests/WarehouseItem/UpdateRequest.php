<?php

namespace App\Http\Requests\WarehouseItem;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Http\JsonResponse;

class UpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            "warehouse_id" => ["sometimes", 'nullable', "integer", "exists:warehouses,id"],
            "item_id" => ["sometimes", 'nullable', "integer", "exists:items,id"],
            "amount" => ["sometimes", 'nullable', "integer"]
        ];
    }

    public function actualize(): JsonResponse
    {
        return $this->warehouseItem->update([
            "warehouse_id" => $this->get("warehouse_id", $this->warehouseItem->warehouse_id),
            "item_id" => $this->get("item_id", $this->warehouseItem->item_id),
            "amount" => $this->get("amount", $this->warehouseItem->amount)
        ]) ? response()->json($this->warehouseItem, 204) 
        : response()->json("Something went wrong.", 500);
    }
}
