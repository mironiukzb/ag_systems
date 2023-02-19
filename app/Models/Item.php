<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'name',
        'price'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'double'
    ];

    public function toArray(): Array
    {
        $array = parent::toArray();

        return [
            'id' => $array['id'] ?? $this->id,
            'name' => $array['name'] ?? $this->name,
            'price' => $array['price'] ?? $this->price,
            'warehouses' => $this->warehouses()?->toArray(),
        ];
    }

    public function warehouses()
    {
        return WarehouseItem::select(['warehouse_id', 'amount'])->where('item_id', $this->id)->get();
    }

    public function warehouseItems() {
        return $this->hasMany(WarehouseItem::class);
    }

    public function scopePriceFrom($query, $price) {
        $query->where('price', '>', $price);
    }

    public function scopePriceTo($query, $price) {
        $query->where('price', '<', $price);
    }


    public function scopeWarehouse($query, $warehouse) {
        $query->whereHas('warehouseItems', function ($q) use ($warehouse) {
            $q->where('warehouse_id', $warehouse);
        });
    }
}
