<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\AGENT\AgentDashboardController;
use App\Http\Controllers\WEB\ADMIN\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout', [AdminDashboardController::class, 'logout'])->name('logout');
});

Route::prefix('agent')->name('agent.')->middleware(['auth','role:agent'])->group(function(){
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
});
require __DIR__.'/auth.php';
