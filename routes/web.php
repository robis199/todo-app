<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/boss', [TaskController::class,'show']);
Route::post('/tasks', [TaskController::class,'store']);
Route::get('/tasks/create', [TaskController::class,'search']);
Route::post('/tasks/{id}', [TaskController::class,'delete']);

