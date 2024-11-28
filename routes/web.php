<?php

use App\Http\Controllers\ReportBugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Dev;
use App\Models\Developer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\InventoryController;



// Default Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});


Route::get('/bookindex', function () {
    return view('/pages/BookIndex');
})->name('IndexBook');

Route::get('/Events', function () {
    return view('/pages/Events');
})->name('event');

Route::get('/Guide', function () {
    return view('/pages/Guide');
})->name('guide');

// Unlogged in users pages
Route::get('/outside/faqs', function () {
    return view('/outside/faqs');
})->name('outside.faqs');

Route::get('/outside/reportbug', function () {
    return view('/outside/reportbug');
})->name('outside.reportbug');

Route::get('/outside/contactus', function () {
    return view('/outside/contactus');
})->name('outside.contactus');

Route::get('/outside/help', function () {
    return view('/outside/help', [
        "devs" => Developer::allDevs(),
    ]);
})->name('outside.help');

// Authentication Routes
Auth::routes();

// Task Routes (with Auth Middleware)
Route::middleware('auth')->group(function () {
    // Home and Starred Page Routes
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\DisplayController::class, 'index'])->name('home');
    Route::get('/pages/starred', [App\Http\Controllers\DisplayController::class, 'starredIndex'])->name('pages.starred');
    Route::get('/pages/trash', [App\Http\Controllers\DisplayController::class, 'trashIndex'])->name('pages.trash');
    Route::get('/pages/useredit', [App\Http\Controllers\DisplayController::class, 'userIndex'])->name('pages.useredit');
    

    // Help Route
    Route::get('/pages/help', [App\Http\Controllers\HomeController::class, 'help'])->name('pages.help');
    Route::get('/pages/help/{id}', [App\Http\Controllers\HomeController::class, 'findDevs'])->name('pages.developer');

    // Task CRUD and Actions
    Route::post('/create-task', [TaskController::class, 'createTask']);
    Route::put('/edit-task/{task}', [TaskController::class, 'editTask'])->name('tasks.edit');
    // Edit user
    Route::put('/edit-user/{user}', [UserController::class, 'editUser'])->name('user.edit');

    Route::post('/toggle-complete/{id}', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
    Route::post('/tasks/{id}/toggle-complete', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');

    Route::post('/starred-task/{id}', [TaskController::class, 'markAsFavorite'])->name('tasks.starred');
    Route::get('/restore-task/{id}', [TaskController::class, 'restoreTask'])->name('tasks.restore');

    //Task Search
    Route::get('/tasks/search/{context}', [TaskController::class, 'search'])->name('tasks.search');
    // Filter for categories and priorities
    Route::get('/tasks/filter/{context}', [TaskController::class, 'filter'])->name('tasks.filter');


    //Soft Delete
    Route::delete('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
    //Hard Delete
    Route::get('/delete-task-permanently/{id}', [TaskController::class, 'hardDelete'])->name('tasks.deletepermanent');

    //Notification Delete
    Route::get('/delete-notification/{id}', [NotificationController::class, 'deleteNotif'])->name('notification.delete');
    
    //Footer Section 
    //User Help
    Route::get('/FAQS', [App\Http\Controllers\HomeController::class, 'FAQS'])->name('faqs');
    //Report Bug
    // to display the bug report form
    Route::get('/ReportBug', [App\Http\Controllers\ReportBugController::class, 'show'])->name('reportbug.show');
    // to submit the bug report
    Route::post('/ReportBug', [App\Http\Controllers\ReportBugController::class, 'submit'])->name('reportbug.submit');
    //Contact Us
    Route::get('/ContactUs', [HomeController::class, 'ContactUs'])->name('contactus');

});

// Shop routing
Route::middleware('auth')->group(function () {
    Route::get('/Shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/Shop/purchase/{id}', [ShopController::class, 'purchase'])->name('shop.purchase');
    Route::get('/Inventory', [InventoryController::class, 'index'])->name('inventory.index');
});


    