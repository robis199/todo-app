<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

// stock-view
Route::get('/', function () {
    return view('welcome');
});

//auth-view
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//task-crud-view
Route::resource('tasks', TasksController::class)
    ->middleware(['auth']);
// mark as completed
Route::put('/tasks/{task}/complete', [TasksController::class, 'checkedOut'])
    ->middleware(['auth'])->name('tasks.complete');



require __DIR__ . '/auth.php';
