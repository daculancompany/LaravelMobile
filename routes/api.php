<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\SaleDetailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('s');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::apiResource('products', ProductController::class);
    Route::get('products/search/{name}', [ProductController::class, 'search']);

    // Category Routes
    Route::apiResource('categories', CategoryController::class);
    Route::get('sample-query', [CategoryController::class, 'sampleQuery']);

    // Customer Routes
    Route::apiResource('customers', CustomerController::class);

    // Sales Routes
    Route::apiResource('sales', SaleController::class);
    Route::post('sales/{sale}/process-payment', [SaleController::class, 'processPayment']);

    // Sale Details Routes (nested under sales)
    Route::apiResource('sales.details', SaleDetailController::class)
        ->only(['index', 'show', 'update', 'destroy'])
        ->scoped();
});
