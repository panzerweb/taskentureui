<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Default Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

//Authentication Route
Auth::routes();

//Pages and Home Route for navigational links
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pages/starred', [App\Http\Controllers\HomeController::class, 'starred'])->name('pages.starred');
Route::get('/pages/trash', [App\Http\Controllers\HomeController::class, 'trash'])->name('pages.trash');
Route::get('/pages/help', [App\Http\Controllers\HomeController::class, 'help'])->name('pages.help');

//Task Routes
Route::middleware('auth')->group(function () {
    // Create
    Route::post('/create-task', [TaskController::class, 'createTask']);

    //=============================
    // Updates
    //=============================
    Route::post('/toggle-complete/{id}', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
    Route::put('/edit-task/{task}', [TaskController::class, 'editTask'])->name('tasks.edit');

    //Delete Soft Delete
    Route::delete('/delete-task/{task}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
    //Mark as Favorite
    Route::post('/starred-task/{id}', [TaskController::class, 'markAsFavorite'])->name('tasks.starred');

    //=============================
    // Display Routes for all pages
    //=============================
    Route::get('/home', [TaskController::class, 'index'])->name('home');
    Route::get('/pages/starred', [TaskController::class, 'starredIndex'])->name('pages.starred');
});

