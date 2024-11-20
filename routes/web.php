<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Models\Dev;
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [TaskController::class, 'index'])->name('home');
    Route::get('/pages/starred', [TaskController::class, 'starredIndex'])->name('pages.starred');
    Route::get('/pages/trash', [App\Http\Controllers\TaskController::class, 'trashIndex'])->name('pages.trash');
  
    // Help Route
    Route::get('/pages/help', [App\Http\Controllers\HomeController::class, 'help'])->name('pages.help');
    Route::get('/pages/help/{id}', [App\Http\Controllers\HomeController::class, 'findDevs'])->name('pages.developer');

    // Task CRUD and Actions
    Route::post('/create-task', [TaskController::class, 'createTask']);
    Route::put('/edit-task/{task}', [TaskController::class, 'editTask'])->name('tasks.edit');

    Route::post('/toggle-complete/{id}', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
    Route::post('/tasks/{id}/toggle-complete', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');

    Route::post('/starred-task/{id}', [TaskController::class, 'markAsFavorite'])->name('tasks.starred');
    Route::get('/restore-task/{id}', [TaskController::class, 'restoreTask'])->name('tasks.restore');

    //Task Search
    Route::get('/tasks/search/{context}', [TaskController::class, 'search'])->name('tasks.search');

    //Soft Delete
    Route::delete('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
    //Hard Delete
    Route::get('/delete-task-permanently/{id}', [TaskController::class, 'hardDelete'])->name('tasks.deletepermanent');

    
    //Footer Section 
    //User Help
    Route::get('/FAQS', [App\Http\Controllers\HomeController::class, 'FAQS'])->name('faqs');
    //Report Bug
    Route::get('/ReportBug', [App\Http\Controllers\HomeController::class, 'ReportBug'])->name('reportbug');
    // Developer Message
    Route::get('/devMessage', [App\Http\Controllers\HomeController::class, 'devMessage'])->name('devmessage');

});


    