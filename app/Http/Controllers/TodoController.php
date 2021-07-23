<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends BaseController
{
    public $me = "hello world";

    public $service;

    public $data = [];

    public function __construct(TodoService $todoService)
    {
        $this->service = $todoService;
    }

    public function index()
    {
        // dd(Str::todo_mixin(), Str::todo_mixin_1());
        // dd(Str::todo());

        // return $this->jsonA();
        // return $data.' TodoController';
        // return $this->jsonB();
        // return $this->jsonA();
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

    public function jsonB()
    {
        return "JSONB";
    }

    public function submit(Request $request)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        return $this->service->create($data);
        // return redirect()->back();
        // return json_decode(json_encode($request->title));
        // Todo::create($data);
        // return redirect()->back();
    }

    public function delete($id)
    {
        // $data = Todo::where('id', $id)->delete(); //opject
        // $data = (object) Todo::where('id', $id)->delete(); //opject
        $data = Todo::where('id', $id)->delete(); //array
        // $data = json_encode($data); // string

        // $number = 'a';
        // $number = (integer) $number; // error
        // $number = '1'|1;
        // $number = (integer) $number; // true
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string',
            'title' => 'required',
        ]);
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect('/todo');
    }

    public function getTodo($id)
    {
        return Todo::where('id', $id)->get();
    }

    public function view($id)
    {
        $data = Todo::where('id', $id)->first();
        return view('todo.view', ['data' => $data]);
    }

    public function viewUpdate($id)
    {
        $data = Todo::where('id', $id)->first();
        return view('todo.update', ['data' => $data]);
    }
}
