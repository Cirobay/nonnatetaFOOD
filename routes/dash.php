<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\DashController;
use App\Http\Controllers\Dash\UserController;
use App\Http\Controllers\Dash\ProductController;
use App\Http\Controllers\Dash\ClientController;
use App\Http\Controllers\Dash\TodoController;

/*
|--------------------------------------------------------------------------
| Dash Routes
|--------------------------------------------------------------------------
*/

Route::get('dash', [DashController::class, 'index'])->name('dash.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('dash.users');

Route::resource('products', ProductController::class)->names('dash.products');

Route::resource('clients', ClientController::class)->names('dash.clients');

Route::resource('todos', TodoController::class)->names('dash.todos');
