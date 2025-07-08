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
        Route::get('create', [EconomicGroupController::class, 'create'])->name('group.create');
        Route::post('store', [EconomicGroupController::class, 'store'])->name('group.store');
        Route::get('{economic_groups}/edit', [EconomicGroupController::class, 'edit'])->name('group.edit');
        Route::put('{economic_groups}', [EconomicGroupController::class, 'update'])->name('group.update');
        Route::delete('{economic_groups}', [EconomicGroupController::class, 'destroy'])->name('group.destroy');
    });
});

require __DIR__ . '/auth.php';
