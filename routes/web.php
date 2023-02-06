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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
    Route::group(['middleware' => ['auth']], function() {
        /*Gestão*/
        Route::get('management', [App\Http\Controllers\ManagementController::class, 'index'])->name('management');
        Route::get('management/register-spending', [App\Http\Controllers\ManagementController::class, 'create'])->name('register-spending');
        Route::post('management/store-spending', [App\Http\Controllers\ManagementController::class, 'store'])->name('store-spending');
        Route::get('management/{id}/edit-spending', [App\Http\Controllers\ManagementController::class, 'edit'])->name('edit-spending');
        Route::delete('management/{id}/', [App\Http\Controllers\ManagementController::class, 'destroy'])->name('delete-spending');
        Route::put('management/{id}/', [App\Http\Controllers\ManagementController::class, 'update'])->name('update-spending');

        /*Inadimplentes*/
        Route::get('clients', [App\Http\Controllers\RegisterClient::class, 'index'])->name('clients');
        Route::get('clients/register-client', [App\Http\Controllers\RegisterClient::class, 'create'])->name('register-client');
        Route::post('/', [App\Http\Controllers\RegisterClient::class, 'store'])->name('store-client');
        Route::get('clients/{id}/edit-client', [App\Http\Controllers\RegisterClient::class, 'edit'])->name('edit-client');
        Route::put('clients/{id}/', [App\Http\Controllers\RegisterClient::class, 'update'])->name('update-client');
        Route::delete('clients/{id}/', [App\Http\Controllers\RegisterClient::class, 'destroy'])->name('delete-client');
    });


