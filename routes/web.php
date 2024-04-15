<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(App\Http\Controllers\ProductsController::class)->group(function(){
    Route::get('products', 'index');
    Route::get('products/create', 'create');
    Route::post('products/create', 'store');
    Route::get('products/{product_id}/edit', 'edit');
    Route::put('products/{product_id}/edit', 'update');
    Route::get('products/{product_id}/delete', 'destroy');
});
