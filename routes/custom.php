<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Components\AuthController;
use App\Http\Middleware\Auth\CheckRole;
use App\Http\Controllers\Components\DasboardController;
use App\Http\Controllers\Components\AdminController\BudgetCtrl as AdminBudgets;
use App\Http\Controllers\Components\AdminController\RequestBudgetCtrl as AdminRequestBudget;
use App\Http\Controllers\Components\UserController\BudgetCtrl as UserBudgets;
use App\Http\Controllers\Components\UserController\RequestBudgetCtrl as UserRequestBudget;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// ===================================

Route::get('/block', [AuthController::class, 'block']);

// ===================================

Route::group(['prefix' => '/auth'], function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/reset', [AuthController::class, 'showResetForm'])->name('reset');
    Route::post('/reset', [AuthController::class, 'reset']);

    Route::get('/role', [StoreController::class, 'RoleForm'])->name('role');
    Route::post('/role', [StoreController::class, 'register_role']);

    Route::get('/department', [StoreController::class, 'DepartmentForm'])->name('department');
    Route::post('/department', [StoreController::class, 'register_department']);
});

// ===================================

// Admin
Route::middleware(['auth', CheckRole::class . ':102'])->group(function () {
    Route::get('/admin/dashboard', [DasboardController::class, 'adminDashboard'])->name('admin.dashboard');

    // Budgets
    Route::resource('admin/budget', AdminBudgets::class)->names('admin.budget');
    Route::get('admin/budget/{department_code?}/search', [AdminBudgets::class, 'search'])->name('admin.budget.search');

    // Request
    Route::resource('admin/budgets/request', AdminRequestBudget::class)->names('admin.request');
    Route::get('admin/budgets/request/{department_code?}/search', [AdminRequestBudget::class, 'search'])->name('admin.request.search');

});


// User
Route::middleware(['auth', CheckRole::class . ':103'])->group(function () {
    Route::get('/user/dashboard', [DasboardController::class, 'userDashboard'])->name('user.dashboard');

    // Budgets
    Route::resource('user/budget', UserBudgets::class)->names('user.budget');
    Route::get('user/budget/{department_code?}/search', [UserBudgets::class, 'search'])->name('user.budget.search');

    // Request
    Route::resource('user/budgets/request', UserRequestBudget::class)->names('user.request');
    Route::get('user/budgets/request/{department_code?}/search', [UserRequestBudget::class, 'search'])->name('user.request.search');

});


use App\Http\Controllers\Components\Allocation;
Route::resource('/cost', Allocation::class);


