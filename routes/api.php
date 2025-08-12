<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

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

// Record CRUD routes
Route::prefix('records')->group(function () {
    Route::get('/', [RecordController::class, 'index']);
    Route::post('/', [RecordController::class, 'store']);
    Route::get('/search', [RecordController::class, 'search']);
    Route::get('/{id}', [RecordController::class, 'show']);
    Route::put('/{id}', [RecordController::class, 'update']);
    Route::delete('/{id}', [RecordController::class, 'destroy']);
});
