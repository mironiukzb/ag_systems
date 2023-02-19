<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseItem\StoreRequest;
use App\Http\Requests\WarehouseItem\UpdateRequest;
use App\Models\WarehouseItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WarehouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {;
        return $request->insert();
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseItem $warehouseItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, WarehouseItem $warehouseItem)
    {
        return $request->actualize();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseItem $warehouseItem): Response
    {
        //
    }
}
