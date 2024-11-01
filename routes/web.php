<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPermissionController;
use App\Http\Controllers\DashboardRoleController;
use App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// DASHBOARD
Route::group(['middleware' => ['auth','role:superadmin|admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Permissions
    Route::resource('/dashboard/permissions', DashboardPermissionController::class);

    // Roles
    Route::get('/dashboard/roles/{role}/givePermissions', [DashboardRoleController::class, 'addPermissionToRole'])->name('roles.add.permission');
    Route::put('/dashboard/roles/{role}/givePermissions', [DashboardRoleController::class, 'updatePermissionToRole'])->name('roles.update.permission');
    Route::resource('/dashboard/roles', DashboardRoleController::class);

    // Users
    Route::resource('/dashboard/users', DashboardUserController::class);
});
