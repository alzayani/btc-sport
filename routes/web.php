<?php

use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/view/{id}', [UserController::class, 'view'])->name('user.view');

    });
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', [AdministrationController::class, 'index'])->name('administration.index');
    });
    Route::group(['prefix' => 'membership'], function () {
        Route::get('/', [MembershipController::class, 'index'])->name('member.index');
    });


    //Departments
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('store', [DepartmentController::class, 'store'])->name('department.store');
        Route::post('edit', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('update', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('delete/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    });

    //Employees
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('employee.index');
        Route::get('create', [EmployeesController::class, 'create'])->name('employee.create');
        Route::post('store', [EmployeesController::class, 'store'])->name('employee.store');
        Route::get('view/{id}', [EmployeesController::class, 'view'])->name('employee.view');
        Route::get('edit/{id}', [EmployeesController::class, 'edit'])->name('employee.edit');
        Route::post('update/{id}', [EmployeesController::class, 'update'])->name('employee.update');
        Route::delete('delete/{id}', [EmployeesController::class, 'destroy'])->name('employee.destroy');
        Route::post('attachments', [EmployeesController::class, 'attachments'])->name('employee.attachments');
    });



});
