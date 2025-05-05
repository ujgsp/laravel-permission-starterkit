<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPermissionController;
use App\Http\Controllers\DashboardProfileController;
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

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        
        Route::resource('permissions', DashboardPermissionController::class);

        Route::get('roles/{role}/givePermissions', [DashboardRoleController::class, 'addPermissionToRole'])->name('roles.add.permission');
        Route::put('roles/{role}/givePermissions', [DashboardRoleController::class, 'updatePermissionToRole'])->name('roles.update.permission');
        Route::resource('roles', DashboardRoleController::class);

        Route::resource('users', DashboardUserController::class);

        Route::get('profile', [DashboardProfileController::class, 'index'])->name('profile.index');
        Route::put('profile/update', [DashboardProfileController::class, 'update'])->name('profile.update');
    });
});
