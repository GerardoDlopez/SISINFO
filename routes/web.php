<?php

use App\Http\Controllers\VotanteController;
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
    return view('logueo/login');
});


Route::controller(VotanteController::class)->group(function(){
    Route::get('/votantes_read','votantes_read')->name('votantes.read');
    Route::get('/votantes_create','votantes_create')->name('votantes.create');
    Route::get('/votantes_update','votantes_uptade')->name('votantes.update');
    Route::get('/votantes_delete','votantes_delete')->name('votantes.delete');
});