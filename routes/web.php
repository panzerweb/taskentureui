<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Default Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Task Routes (with Auth Middleware)
Route::middleware('auth')->group(function () {
    // Home and Starred Page Routes
    Route::get('/home', [TaskController::class, 'index'])->name('home');
    Route::get('/pages/starred', [TaskController::class, 'starredIndex'])->name('pages.starred');
    Route::get('/pages/trash', [App\Http\Controllers\HomeController::class, 'trash'])->name('pages.trash');
    // Help Route
    Route::get('/pages/help', [App\Http\Controllers\HomeController::class, 'help'])->name('pages.help');

    // Task CRUD and Actions
    Route::post('/create-task', [TaskController::class, 'createTask']);
    Route::post('/toggle-complete/{id}', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
    Route::put('/edit-task/{task}', [TaskController::class, 'editTask'])->name('tasks.edit');
    Route::delete('/delete-task/{task}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
    Route::post('/starred-task/{id}', [TaskController::class, 'markAsFavorite'])->name('tasks.starred');
});
