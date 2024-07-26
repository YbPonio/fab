<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/product', [ProductController::class, 'get']);
Route::get('/product/{id}', [ProductController::class, 'getById']);
Route::post('/product', [ProductController::class, 'create']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::patch('/product/{product}', [ProductController::class, 'update']);


Route::get('/category', [CategoryController::class, 'get']);
Route::get('/store', [StoreController::class, 'get']);
