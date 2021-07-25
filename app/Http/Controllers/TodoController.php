<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use App\Pipelines\Active;
use App\Pipelines\Name;
use App\Pipelines\Title;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

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

        // $todos = app(Pipeline::class)
        //     ->send(Todo::query())
        //     ->through([
        //         Active::class,
        //         Title::class,
        //     ])
        //     ->thenReturn();

        $user = app(Pipeline::class)
            ->send(User::query())
            ->through([
                Name::class,
            ])
            ->thenReturn();
        return $user->get();
        // return Auth::user();
        // dd(Str::todo_mixin(), Str::todo_mixin_1());
        // dd(Str::todo());

        // return $this->jsonA();
        // return $data.' TodoController';
        // return $this->jsonB();
        // return $this->jsonA();
        // return iprint('hello laravel');
        $db_todo = Todo::with('user', 'image')->get();
        // select * from todos
        $data = [
            'todo' => $db_todo,
        ];

        // return $db_todo;
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
            'user_id'=> Auth::user()->id,
        ];
        // return $data;
        $todo = $this->service->create($data);
        $todo->images()->create(['url'=>$request->image]);
        return redirect()->back();
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
        // if($request->user()){
        //     $request->validate([
        //         'body' => 'required|string',
        //         'title' => 'required',
        //     ]);
        //     Todo::where('id', $id)->update([
        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'user_id'=> Auth::user()->id,
        //     ]);
        //     return redirect('/todo');
        // }
        if(auth()->check()){
            $request->validate([
                'body' => 'required|string',
                'title' => 'required',
            ]);
            Todo::where('id', $id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'user_id'=> Auth::user()->id,
            ]);
            return redirect('/todo');
        }
    }

    public function getTodo($id)
    {
        return Todo::where('id', $id)->get();
    }

    public function view($id)
    {
        $data = Todo::with('user')->where('id', $id)->first();
        return view('todo.view', ['data' => $data]);
    }

    public function viewUpdate($id)
    {
        $data = Todo::where('id', $id)->first();
        return view('todo.update', ['data' => $data]);
    }
}
