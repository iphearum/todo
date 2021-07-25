<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        return $this->service->getUser();

        // $todo = Todo::with('user')->get();
        // return $todo;

        // $user = User::all();
        $user = User::with('todos', 'todos.user')->get();
        return $user;
    }

    public function createUser(Request $request)
    {
        $user = $this->service->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->avatar()->create(['url'=> $request->url ?? null]);
        return redirect()->back();
    }
}
