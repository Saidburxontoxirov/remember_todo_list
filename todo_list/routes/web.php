<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth.basic'])->group(function () {
    Route::get('todos', [TodoListController::class, 'todos']);
    Route::get('todos/edit/{todoId}', [TodoListController::class, 'editTodo']);
    Route::get('store', function () {
        return view('todo.add');
    });
    Route::post('add_todo', [TodoListController::class, 'addTodo'])->name('add_todo');
    Route::put('update_todo/{todoId}', [TodoListController::class, 'updateTodo']);
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
