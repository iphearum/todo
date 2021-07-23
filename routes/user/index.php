<?php

use App\Http\Controllers\UserController;

$router->get('/user_posts', [UserController::class, 'index']);
