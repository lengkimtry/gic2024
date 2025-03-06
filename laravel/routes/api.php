<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function(){
    Route::get('/', 'getCategories'); // Get all Categories
    Route::post('/', 'createCategory'); // Create 1 category
    Route::get('/{categoryId}', 'getCategory'); // Get 1 category by categoryId
    Route::patch('/{categoryId}', 'updateCategory'); // Update 1 category
    Route::delete('/{categoryId}', 'deleteCategory'); // Delete 1 category
    Route::get('/{categoryId}/products', 'getCategoryProducts'); // Get all products belong to categoryId
});

Route::controller(ProductController::class)->prefix('products')->group(function(){
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct');
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct');
    Route::delete('/{productId}', 'deleteProduct');
});