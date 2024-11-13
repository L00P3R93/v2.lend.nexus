<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RefinanceController;
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

    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/create', [LeadController::class, 'create']);
    Route::post('/leads/create', [LeadController::class, 'store']);
    Route::get('/leads/{id}', [LeadController::class, 'show']);
    Route::get('/leads/edit/{id}', [LeadController::class, 'edit']);
    Route::put('/leads/edit/{id}', [LeadController::class, 'update']);

    Route::get('/loans', [LoanController::class, 'index']);
    Route::get('/loans/create/{id}', [LoanController::class, 'create']);
    Route::post('/loans/create/{id}', [LoanController::class, 'store']);
    Route::get('/loans/{id}', [LoanController::class, 'show']);
    Route::get('/loans/edit/{id}', [LoanController::class, 'edit']);
    Route::put('/loans/edit/{id}', [LoanController::class, 'update']);

    Route::get('/refinances', [RefinanceController::class, 'index']);

    Route::get('/branches/{bankId}', [BranchController::class, 'getBranchByBank']);

});


