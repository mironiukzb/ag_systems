<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'items'], function () {
    Route::get('', [ItemController::class, 'index'])->name('items');
    Route::get('/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::post('', [ItemController::class, 'store'])->name('items.store');
    Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

Route::group(['prefix' => 'warehouses'], function () {
    Route::get('/{warehouse}', [WarehouseController::class, 'show'])->name('warehouses.show');
    Route::post('', [WarehouseController::class, 'store'])->name('warehouses.store');
    Route::put('/{warehouse}', [WarehouseController::class, 'update'])->name('warehouses.update');
    Route::delete('{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouses.destroy');
});


Route::group(['prefix' => 'warehouse_items'], function () {
    Route::post('', [WarehouseItemController::class, 'store'])->name('warehouse_items.store');
    Route::put('/{warehouseItem}', [WarehouseItemController::class, 'update'])->name('warehouse_items.update');
    Route::delete('{warehouseItem}', [WarehouseItemController::class, 'destroy'])->name('warehouse_items.destroy');
});