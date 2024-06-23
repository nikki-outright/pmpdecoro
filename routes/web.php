<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

//For Login

//Route::get('dashboard', [ DashboardController::class, 'index'])->name('dashboard');

//Add Category
 Route::get('/add-category', [ CategoryController::class, 'index'])->name('add-category');
 Route::post('add-category', [ CategoryController::class, 'store'])->name('add-category.store');
 Route::get('/add-category', [ CategoryController::class, 'show'])->name('add-category');
 Route::delete('/add-category-delete\{id}', [CategoryController::class, 'force_delete'])->name('add-category.delete');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('index', [HomeController::class, 'index1'])->name('index');
