<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TaskController::class, 'index']);
  
    // User
    Route::resource('/users', UserController::class)
        ->only([
            'show',
            'edit',
            'update',
            'destroy'
        ]);

    // Group
    Route::resource('/groups', GroupController::class)
        ->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);

    // Task
    Route::resource('/groups/{group}/tasks', TaskController::class);

    // Tag
    Route::resource('/tag', TagController::class)
        ->only(['store']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
