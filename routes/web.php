<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

// Route::prefix('todo')->group(function(){
//     Route::get('/', [TodoController::class, 'index'])->name('todo');
//     Route::post('/submit', [TodoController::class, 'submit'])->name('todo.submit');
//     Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
//     Route::patch('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
//     Route::get('/view/{id}', [TodoController::class, 'view'])->name('todo.view');

//     // Route::middleware('auth')->group(function(){
//     //     Route::get('/view/update/{id}', [TodoController::class, 'viewUpdate'])->name('todo.view.update');
//     // });
//     Route::group([
//         'middleware'=>'auth',
//     ], function(){
//         Route::get('/view/update/{id}', [TodoController::class, 'viewUpdate'])->name('todo.view.update');
//     });
// });

// Route::group([
//     'prefix'=>'todo'
// ], function (){
//     Route::get('/', [TodoController::class, 'index'])->name('todo');
//     Route::post('/submit', [TodoController::class, 'submit'])->name('todo.submit');
//     Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
//     Route::patch('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
//     Route::get('/view/{id}', [TodoController::class, 'view'])->name('todo.view');

//     Route::group([
//         'middleware'=>'auth',
//     ], function(){
//         Route::get('/view/update/{id}', [TodoController::class, 'viewUpdate'])->name('todo.view.update');
//     });
// });


$routers = [
    'todo',
    'user'
];
foreach($routers as $key){
    Route::prefix($key)->group(function() use ($key, $router){
        Route::middleware('auth')->group(function() use ($key, $router){
            require __DIR__."/$key/auth.php";
        });
        require __DIR__."/$key/index.php";
    });
}





Route::get('/test', [TestController::class,'index']);

Route::get('/user',function (){
    return view('user.index');
});

Route::post('/user/submit',[UserController::class, 'createUser'])->name('user.submit');



$router->get('/get_todo/{id}', [TodoController::class,'getTodo']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/who', [WhoController::class, 'index']);
