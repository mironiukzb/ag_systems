<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Dyrynda\Database\Support\CascadeSoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'name',
        'code',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        "created_at" => "datetime:Y-m-d\\TH:i:sP",
        "updated_at" => "datetime:Y-m-d\\TH:i:sP",
        "deleted_at" => "datetime:Y-m-d\\TH:i:sP"
    ];
}
