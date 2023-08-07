<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CobradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AvalController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\CobradorClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login',[AuthController::class,'loginView'])->name('login');
Route::post('sesion', [AuthController::class,'login'])->name('sesion');


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[AuthController::class,'dashboardView'])->name('dashboardView');
    Route::get('perfil', [AuthController::class,'perfilView'])->name('perfilView');
    Route::post('perfilupdate/{id}', [AuthController::class,'updatePassword']);
    Route::get('singOut', [AuthController::class,'singOut'])->name('singOut');

    Route::resource('empleados', EmpleadoController::class);
    Route::resource('cobradores', CobradorController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('avales', AvalController::class);
    Route::resource('prestamos', PrestamosController::class);
    Route::resource('clientecobrador', CobradorClienteController::class);

    Route::post('storeclicobra/{id}',[CobradorClienteController::class,'storeClientCollecting']);
    Route::get('showavales/{id}',[CobradorClienteController::class,'showAvales']);
    Route::get('showprestamos/{id}',[CobradorClienteController::class,'showPrestamos']);
    Route::get('showhistorialprestamo/{id}',[CobradorClienteController::class,'showHistorialPrestamo']);

    Route::post('rechazarprestamo/{id}',[ PrestamosController::class,'rejectLoan']);

    Route::get('historalprestamo/{id}',[HistorialController::class,'getLoanHistory']);

});
