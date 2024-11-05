<?php

use App\Http\Controllers\IncomingLogDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\IncomingLogController;
use App\Http\Controllers\CallbackLogController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin-users.index');
    });

    Route::resource('admin-users', AdminUserController::class);

    Route::resource('incoming-logs', IncomingLogController::class)->only([
        'index', 'show'
    ]);
    Route::resource('incoming-log-data', IncomingLogDataController::class)->only([
        'index', 'show'
    ]);

    Route::resource('callback-logs', CallbackLogController::class)->only([
        'index', 'show'
    ]);
});
