<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\{InventarioController, OrdenController};

/*Route::get('/', function () {
    return view('welcome'); 
});*/ 

Route::get('/', HomeController::class);

Route::get('/gestion_productos', [InventarioController::class, 'index'])->name('gestion_productos.index');
Route::post('/categorias/store', [InventarioController::class, 'store_categoria'])->name('categorias.store');
Route::put('/categorias/update/{id}', [InventarioController::class, 'update_categoria'])->name('categorias.update');

Route::get('/stock_critico', [OrdenController::class, 'index'])->name('stock_critico.index');
Route::get('/stock_critico/ordenes', [OrdenController::class, 'show_orden'])->name('stock_critico.ordenes');
Route::post('/ordenes/store', [OrdenController::class, 'store_orden'])->name('ordenes.store');
