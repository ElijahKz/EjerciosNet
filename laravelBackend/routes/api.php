<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmpleadoController;
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

Route::prefix('empleados')->group(function () {
    Route::get('/', [EmpleadoController::class, 'getAll']);
    Route::post('/', [EmpleadoController::class, 'create']);
    Route::delete('/{id}', [EmpleadoController::class, 'delete']);
    Route::get('/{id}', [EmpleadoController::class, 'get']);
    Route::put('/{id}', [EmpleadoController::class, 'update']);



});
