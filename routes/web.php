<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'checkSession'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/create', [RoleController::class, 'create']);
    Route::post('/roles/create', [RoleController::class, 'store']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit']);
    Route::put('/roles/edit/{id}', [RoleController::class, 'update']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users/create', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::put('/users/edit/{id}', [UserController::class, 'update']);

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/create', [CustomerController::class, 'create']);
    Route::post('/customers/create', [CustomerController::class, 'store']);
    Route::get('/customers/{id}', [CustomerController::class, 'show']);
    Route::get('/customers/edit/{id}', [CustomerController::class, 'edit']);
    Route::put('/customers/edit/{id}', [CustomerController::class, 'update']);
});


