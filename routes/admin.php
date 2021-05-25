<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'inicio'])->name('admin.home');

Route::resource('categorias', CategoryController::class)->names('admin.categories');
