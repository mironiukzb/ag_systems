<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Item::when($request->has("price_from"), fn ($query) => $query->priceFrom($request->price_from))
                                            ->when($request->has("price_to"), fn ($query) => $query->priceTo($request->price_to))
                                            ->when($request->has("warehouse"), fn ($query) => $query->warehouse($request->warehouse))
                                            ->paginate($request->get('per_page', 10))
                                            ->onEachSide(0)
                                            ->withQueryString()
                                            ->through(fn ($item) => $item->toArray()));
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
    public function show(Item $item)
    {
        return response()->json($item->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Item $item)
    {
        return $request->actualize();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item): Response
    {
        return $item->delete()
            ? response()->noContent() 
            : response()->json("Something went wrong.", 500);
    }
}
