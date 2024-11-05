<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/new', [UserController::class, 'createUser']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::put('/users/edit/{id}', [UserController::class, 'update']);
