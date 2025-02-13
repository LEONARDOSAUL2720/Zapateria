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
Route::get('/delete-producto/{producto_id}', [
    'as' => 'deleteProducto',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ProductoController@deleteProducto'
]);

Route::get('/delete-sucursal/{sucursal_id}', [
    'as' => 'deleteSucursal',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\SucursalController@deleteSucursal'
]);



Route::get('/catalogo', function () {
    // Asegúrate de tener una vista llamada catalogo
    return view('catalogo'); 
})->name('catalogo');

Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');
Route::get('/imprimirBD',[App\Http\Controllers\GeneradorController::class, 'imprimirBD'])->name('imprimirBD');

Route::resource('asset', App\Http\Controllers\AssetController::class)->middleware('auth');
Route::get('/video-file/{filename}', array(
    'as' => 'fileVideo',
    'uses' => 'App\Http\Controllers\VideoController@getVideo'
 ));
 Route::get('/miniatura/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'App\Http\Controllers\VideoController@getImage'
 ));