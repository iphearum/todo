<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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



Route::get('/test', [TestController::class,'index']);

Route::get('/user',function (){
    return view('user.index');
});
Route::post('/user/submit',[UserController::class, 'createUser'])->name('user.submit');



$router->get('/get_todo/{id}', [TodoController::class,'getTodo']);
