<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/todo', function () {
//     return "hello world";
// });

Route::get('/todo', [TodoController::class, 'index']);
Route::post('/todo/submit', [TodoController::class, 'submit'])->name('todo.submit');
Route::delete('/todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::patch('/todo/update', [TodoController::class, 'update'])->name('todo.update');
