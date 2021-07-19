<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public $me = "hello world";

    public $data = [];

    public function index()
    {
        $db_todo = Todo::all();
        $data = [
            'hello' => $this->me,
            'me' => "phearum",
            'todo' => $db_todo,
        ];
        return view('todo.index', $data);
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
        $data = Todo::where('id', $id);
        $data->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        Todo::where('id', $request->id)
            ->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
        return redirect()->back();
    }
}
