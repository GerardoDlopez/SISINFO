<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\graficoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PromovidoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

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



Route::controller(PromovidoController::class)->group(function(){
    Route::get('/ver_promovidos','promovido_read')->name('promovido.read')->middleware('can:ver-promovidos','auth');
    Route::get('/añadir_promovido','promovido_create')->name('promovido.create')->middleware('can:agregar-promovidos','auth');
    Route::post('/promovido_store','promovido_store')->name('promovido.store')->middleware('can:agregar-promovidos','auth');
    Route::get('/editar_promovido/{promovido}','promovido_edit')->name('promovido.edit')->middleware('can:actualizar-promovidos','auth');
    Route::put('/actualizar_promovido/{promovido}','promovido_update')->name('promovido.update')->middleware('can:actualizar-promovidos','auth');
    Route::delete('/eliminar_promovido/{promovido}','promovido_delete')->name('promovido.delete')->middleware('can:eliminar-promovidos','auth');
});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/ver_usuarios','user_read')->name('user.read')->middleware('can:ver-usuarios','auth');
    Route::get('/crear_usuarios','user_create')->name('user.create')->middleware('can:agregar-usuarios','auth');
    Route::post('/usuarios_store','user_store')->name('user.store')->middleware('can:agregar-usuarios','auth');
    Route::get('/editar_usuarios/{id}','user_edit')->name('user.edit')->middleware('can:actualizar-usuarios','auth');
    Route::put('/actualizar_usuario/{user}','user_update')->name('user.update')->middleware('can:actualizar-usuarios','auth');
    Route::delete('/eliminar_usuario/{user}','user_delete')->name('user.delete')->middleware('can:eliminar-usuarios','auth');
    
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/','login')->name('login');
    Route::post('/login_store','login_store')->name('login_store');
    Route::post('/logout','logout')->name('logout');
});

Route::controller(FiltroController::class)->group(function(){
    Route::get('/ver_promovidos/filtro','filtro')->name('filtro')->middleware('can:ver-promovidos','auth');
    Route::get('/ver_promovidos/buscar','buscador')->name('buscador')->middleware('can:ver-promovidos','auth');
});

Route::controller(PdfController::class)->group(function(){
    Route::get('/ver_promovidos/pdf','pdf')->name('pdf')->middleware('can:ver-promovidos','auth');
});

Route::controller(ExcelController::class)->group(function(){
    Route::get('/excel_show','excel_read')->name('excel.read')->middleware('can:ver-promovidos','auth');
    Route::post('/excel_immport','excel_import')->name('excel.importar')->middleware('can:ver-promovidos','auth');
});

Route::controller(graficoController::class)->group(function(){
    Route::get('/graficos','grafico_read')->name('grafico.read')->middleware('can:ver-promovidos','auth');
});