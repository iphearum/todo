<?php

// use Illuminate\Support\Facades\Route;
// Route::get('/view/update/{id}', [TodoController::class, 'viewUpdate'])->name('todo.view.update');

use App\Http\Controllers\TodoController;

$router->get('/view/update/{id}', [TodoController::class, 'viewUpdate'])->name('todo.view.update');
