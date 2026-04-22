<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de Category
Route::get("/categories", [CategoryController::class, "index"])->name("categories.index");
Route::post("/categories", [CategoryController::class, "store"])->name("categories.store");
Route::get("/categories/{id}", [CategoryController::class, "edit"])->name("categories.edit");
Route::delete("/categories/{id}", [CategoryController::class, "destroy"])->name("categories.destroy");
Route::put("/categories/{id}", [CategoryController::class, "update"])->name("categories.update");


//Rutas de Product
Route::get("/products", [ProductController::class, "index"])->name("products.index");
Route::post("/products", [ProductController::class, "store"])->name("products.store");
Route::get("/products/{id}", [ProductController::class, "edit"])->name("products.edit");
Route::delete("/products/{id}", [ProductController::class, "destroy"])->name("products.destroy");
Route::put("/products/{id}", [ProductController::class, "update"])->name("products.update");
Route::get("/precio_max", [ProductController::class, "precio_max"])->name("categories.precio_max")->middleware("precio_max");

//Rutas de Sale
Route::get("/sales", [SaleController::class, "index"])->name("sales.index")->middleware("auth");
Route::post("/sales", [SaleController::class, "store"])->name("sales.store");
Route::get("/sales/{id}", [SaleController::class, "edit"])->name("sales.edit");
Route::delete("/sales/{id}", [SaleController::class, "destroy"])->name("sales.destroy");
Route::put("/sales/{id}", [SaleController::class, "update"])->name("sales.update");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
