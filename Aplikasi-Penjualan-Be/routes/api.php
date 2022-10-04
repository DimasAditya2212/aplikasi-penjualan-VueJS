<?php

use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/createItem', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
Route::put('/items/edit/{id}', [ItemController::class, 'update']);
Route::get('/items/edit/{id}', [ItemController::class, 'edit']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);

// Route::resource('/createItem', [ItemController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return 'no';
    return 'no';
    return 'no';
});
