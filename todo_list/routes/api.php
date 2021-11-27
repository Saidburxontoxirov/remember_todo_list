<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth.basic'])->group(function () {
    Route::get('users', [UserController::class, 'getAllUsers']);
    Route::get('todos', [TodoListController::class, 'todos']);
    Route::get('not_completed_tasks', [TodoListController::class, 'getNotCompletedTasks']);
});
