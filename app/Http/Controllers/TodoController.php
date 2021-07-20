<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use ResponseTrait;

    public $me = "hello world";

    public $data = [];

    public function index()
    {
        // return $this->jsonB();
        return $this->jsonA();
        // return iprint('hello laravel');
        $db_todo = Todo::all();
        // select * from todos
        $data = [
            'hello' => $this->me,
            'me' => "phearum",
            'todo' => $db_todo,
        ];
        return view('todo.index', $data);
    }

    public function jsonB(){
        return "JSONB";
    }

    public function submit(Request $request)
    {
        Todo::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Todo::where('id', $id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        Todo::where('id', $request->id)->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
        return redirect()->back();
    }
}
