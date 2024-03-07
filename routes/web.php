<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CredencialController;
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


Route::controller(CredencialController::class)->group(function(){
    Route::get('/credenciales_read','credencial_read')->name('credencial.read');
    Route::get('/credenciales_create','credencial_create')->name('credencial.create');
    Route::post('/credenciales_create','credencial_store')->name('credencial.store');
    Route::get('/credenciales_edit/{credencial}','credencial_edit')->name('credencial.edit');
    Route::put('/credenciales_update/{credencial}','credencial_update')->name('credencial.update');
    Route::delete('/credenciales_delete/{credencial}','credencial_delete')->name('credencial.delete');
});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/usuarios_read','user_read')->name('user.read');
    Route::get('/usuarios_create','user_create')->name('user.create');
    Route::post('/usuarios_store','user_store')->name('user.store');
    Route::get('/usuarios_edit/{id}','user_edit')->name('user.edit');
    Route::put('/usuarios_update/{user}','user_update')->name('user.update');
    Route::delete('/usuarios_delete/{user}','user_delete')->name('user.delete');
    
    Route::get('/lideres_role','lideres_role')->name('lideres.role');
});