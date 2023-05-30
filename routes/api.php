<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\Forcase;
use App\Http\Controllers\ForcaseController;
use App\Http\Controllers\HistoryDemandController;
use App\Http\Controllers\HistoryStokController;
use App\Http\Controllers\StockController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Stock 
Route::post('update/{id}/stock', [StockController::class, 'updateStock']);
Route::post('store/stock', [HistoryStokController::class, 'historyStock']);
Route::get('stock', [StockController::class, 'index']);

//demand
Route::post('update/{id}/demand', [DemandController::class, 'updateDemand']);
Route::post('store_demand', [HistoryDemandController::class, 'historyDemand']);
Route::get('demand', [DemandController::class, 'index']);

//forecase
Route::get('demand/forcase', [ForcaseController::class, 'forcase']);