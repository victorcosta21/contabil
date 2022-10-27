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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('home', [App\Http\Controllers\PainelController::class, 'index'])->name('home');
    Route::get('home/register-client', [App\Http\Controllers\RegisterClient::class, 'index'])->name('register-client');
    Route::post('/', [App\Http\Controllers\RegisterClient::class, 'store'])->name('store');
    Route::get('home/{id}/edit-client', [App\Http\Controllers\RegisterClient::class, 'edit'])->name('edit-client');
    Route::put('home/{id}/', [App\Http\Controllers\RegisterClient::class, 'update'])->name('update');
    Route::delete('home/{id}/', [App\Http\Controllers\RegisterClient::class, 'destroy'])->name('delete-client');

});

