<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('sucursales', App\Http\Controllers\SucursalController::class)->middleware('auth');
