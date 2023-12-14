<?php

use App\Http\Controllers\Api\CustomersController;
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

// Route::get('customers', [CustomersController::class, 'index']);
// Route::get('customers/{customer_id}', [CustomersController::class, 'show']);
// Route::post('customers', [CustomersController::class, 'store']);
// Route::put('customers/{customer_id}', [CustomersController::class, 'update']);
// Route::delete('customers/{customer_id}', [CustomersController::class, 'destroy']);

Route::apiResource('customers', CustomersController::class);
