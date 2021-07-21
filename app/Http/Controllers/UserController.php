<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(UserService $userService){
        $this->service = $userService;
    }

    public function createUser(Request $request){
        return $this->service->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    }
}
