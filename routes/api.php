<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CobradorController;
use App\Http\Controllers\AvalController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\CobradorClienteController;


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

Route::post('/login',[AuthApiController::class,'loginApp']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/info',[AuthApiController::class,'getAuthenticatedUser']);
        Route::get('/signout',[AuthApiController::class,'logoutApp']);
    });

    Route::get('/getclints/{id}',[CobradorController::class,'showclients']);
    Route::get('/getprestamo/{id}',[PrestamosController::class,'getPrestamoClient']);
    Route::get('/gethistorialprestamo/{id}',[PrestamosController::class,'ApiHistorialPrestamo']);

});




Route::get('getsalary/{id}',[ClienteController::class,'getSalary']);
