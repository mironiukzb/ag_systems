<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'item_id',
        'warehouse_id',
        'amount',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    protected $casts = [
        'id' => 'integer',
        'item_id' => 'integer',
        'warehouse_id' => 'integer',
        'amount' => 'integer',
        "created_at" => "datetime:Y-m-d\\TH:i:sP",
        "updated_at" => "datetime:Y-m-d\\TH:i:sP",
        "deleted_at" => "datetime:Y-m-d\\TH:i:sP"
    ];
}
