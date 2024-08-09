<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormPizza\PizzasController;
use App\Http\Controllers\FormPizza\OrdenesController;

use App\Http\Controllers\FormPizza\IngredientesController;


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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('ordenes/{orden}', [OrdenesController::class, 'show']);



Route::middleware('auth:api')->group(function () {
    
    Route::resource('pizzas', PizzasController::class);

    Route::get('ingredientes/{ingrediente}', [IngredientesController::class, 'show']);
    Route::put('ingredientes/{ingrediente}', [IngredientesController::class, 'update']);
    Route::resource('ingredientes', IngredientesController::class);

    Route::resource('ordenes', OrdenesController::class);
});