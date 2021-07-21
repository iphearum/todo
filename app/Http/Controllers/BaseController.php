<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function jsonC(){
        return $this->json();
        // return 'From BaseController';
    }

    public function create(array $attributes){
        return $this->service->create($attributes);
    }
}
