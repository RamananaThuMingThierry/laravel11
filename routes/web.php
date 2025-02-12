<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\AGENT\AgentController;
use App\Http\Controllers\WEB\ADMIN\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/login', [AdminController::class, 'login']);

Route::middleware('auth')->name('profile.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::prefix('agent')->name('agent.')->middleware(['auth','role:agent'])->group(function(){
    Route::get('/dashboard', [AgentController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
