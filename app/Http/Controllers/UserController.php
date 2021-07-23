<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {

        // $todo = Todo::with('user')->get();
        // return $todo;

        $user = User::with('todos', 'todos.user')->get();
        return $user;
    }

    public function createUser(Request $request)
    {
        return $this->service->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}
