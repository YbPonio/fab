<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/product', [ProductController::class, 'get']);
Route::post('/product', [ProductController::class, 'create']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
