<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends BaseController
{
    public function index(){
        return $this->jsonA();
        // return $data.' TestController';
    }
}
