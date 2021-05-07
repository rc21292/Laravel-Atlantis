<?php

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

// Welcome Page Route

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

	// Dashboard Page Route

	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');

	// Permission Route
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class);
    // Mass Destroy Permissions
    Route::delete('permissions_mass_destroy', [App\Http\Controllers\Admin\PermissionsController::class, 'massDestroy'])->name('permissions.mass_destroy');

    // Roles Route
    Route::resource('roles',App\Http\Controllers\Admin\RolesController::class);
    // Mass Destroy Roles
    Route::delete('roles_mass_destroy', [App\Http\Controllers\Admin\RolesController::class, 'massDestroy'])->name('roles.mass_destroy');
    
    // Users Route
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
    // Mass Destroy Users  
    Route::delete('users_mass_destroy', [App\Http\Controllers\Admin\UsersController::class, 'massDestroy'])->name('users.mass_destroy');

});
