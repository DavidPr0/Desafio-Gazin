<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DevelopersController;
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

Route::get('developers', [DevelopersController::class, 'index']);
Route::post('developers', [DevelopersController::class, 'store']);
Route::get('developers/{id}', [DevelopersController::class, 'show']);
Route::put('developers/{id}',[DevelopersController::class, 'update']);
Route::delete('/developers/{id}', [DevelopersController::class, 'destroy']);
