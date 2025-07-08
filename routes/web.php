<?php

use App\Http\Controllers\EconomicGroupController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::group(['middleware' => 'auth'], function () {
    Route::get('groups', [EconomicGroupController::class, 'index'])->name('groups.index');
    Route::group(['prefix' => 'group'], function () {
        ;
        Route::get('create', [EconomicGroupController::class, 'create'])->name('group.create');
        Route::post('store', [EconomicGroupController::class, 'store'])->name('group.store');
    });
});

require __DIR__ . '/auth.php';
