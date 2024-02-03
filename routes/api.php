<?php

use App\Http\Controllers\{
    SupplierController,
    ProductController
};
use Illuminate\Support\Facades\Route;


Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'get']);
    Route::get('/{supplier}', [SupplierController::class, 'getCurrentUser']);
    Route::post('/', [SupplierController::class, 'create']);
    Route::post('/detach-product', [SupplierController::class, 'detachProduct']);
    Route::put('/{supplier}', [SupplierController::class, 'update']);
    Route::delete('/{supplier}', [SupplierController::class, 'delete']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'get']);
    Route::post('/', [ProductController::class, 'create']);
    Route::put('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'delete']);
});
