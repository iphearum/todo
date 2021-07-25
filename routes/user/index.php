<?php

use App\Http\Controllers\UserController;

$router->get('/user_todos', [UserController::class, 'index']);
