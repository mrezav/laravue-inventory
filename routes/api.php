<?php

use App\Http\Controllers\CostumerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/sales', [SalesController::class, 'index']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/costumers', [CostumerController::class, 'index']);
Route::get('/transaction', [TransactionController::class, 'index']);
Route::post('/transaction-submit', [TransactionController::class, 'submit']);