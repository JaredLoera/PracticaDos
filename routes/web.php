<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\conductoresController;
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
Route::get('/', [conductoresController::class, 'index']);
Route::prefix('conductores')->group(function (){
Route::get('/', [conductoresController::class, 'index']);
Route::post('/saveDriver', [conductoresController::class, 'saveDriver']);
Route::delete('/desactivar/{id}', [conductoresController::class, 'deleteDriver']);
Route::put('/activar/{id}', [conductoresController::class, 'activateDriver']);
});

require __DIR__.'/auth.php';
