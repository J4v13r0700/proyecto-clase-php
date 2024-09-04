<?php

use App\Http\Controllers\SoapController;
use App\Http\Controllers\FormPizza\OrdenesController;
use App\Http\Controllers\FormPizza\PizzasController;
use App\Http\Controllers\FormPizza\IngredientesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("login");


Route::middleware(['cors'])->group(function () {
    Route::get('ingredientes/{ingrediente}', [IngredientesController::class, 'show']);
    Route::put('ingredientes/{ingrediente}', [IngredientesController::class, 'update']);
    Route::resource('ingredientes', IngredientesController::class);

    Route::resource('ordenes', OrdenesController::class);

    Route::post('soap/NumberToWords', [SoapController::class, 'soapCall']);
});

