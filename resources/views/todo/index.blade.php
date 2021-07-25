@extends('layouts.app')

@section('content')
    <div class="center container">
        <h1>Todo {{ $name }} {{ $active ?? false }}</h1>
        <h2>{{ $todo_index }}</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" class="group-control" action="{{ route('todo.submit') }}">
                    @csrf
                    <input type="text" class="p-2 form-control" ​ placeholder="input title" name="title" />
                    <input type="text" class="p-2 form-control" ​ placeholder="input body" name="body" />
                    <input type="text" class="p-2 form-control" name="image" placeholder="image" >
                    <hr>
                    <input type="submit" class="btn btn-primary" value="submit-button" />
                </form>
            </div>
        </div>

        <hr>
        <h4>Count {{ count($todo) }}</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todo as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->body }}</td>
                        <td>{{ getUserName($value->user_id) }} - {{$value->user->name}}</td>
                        <td>URL {{ $value->image ? $value->image->url : 'NULL' }}</td>
                        <td>
                            <a href="{{ route('todo.view', $value->id) }}" class="btn btn-sm btn-primary">VIEW</a>
                            @auth
                                <a href="{{ route('todo.view.update', $value->id) }}" class=" btn-sm btn-second">UPDATE</a>
                                <form method="POST" action="{{ route('todo.delete', $value->id) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
