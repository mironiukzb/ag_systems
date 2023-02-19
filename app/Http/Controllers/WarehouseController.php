<?php

namespace App\Http\Controllers;

use App\Http\Requests\Warehouse\StoreRequest;
use App\Http\Requests\Warehouse\UpdateRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WarehouseController extends Controller
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
    {
        return $request->insert();
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        return response()->json($warehouse->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Warehouse $warehouse)
    {
        return $request->actualize();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        return $warehouse->delete()
        ? response()->noContent() 
        : response()->json("Something went wrong.", 500);
    }
}
