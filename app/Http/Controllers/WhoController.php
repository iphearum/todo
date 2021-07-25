<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class WhoController extends Controller
{
    public function index(){
        return Todo::all()->toArray();
    }
}
