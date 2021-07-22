<?php

use App\Http\Controllers\TodoController;

$router->get('/', [TodoController::class, 'index'])->name('todo');
$router->post('/submit', [TodoController::class, 'submit'])->name('todo.submit');
$router->delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
$router->patch('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
$router->get('/view/{id}', [TodoController::class, 'view'])->name('todo.view');
