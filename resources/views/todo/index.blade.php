@extends('layout')

@section('content')
<div class="center">
    <h1>Todo {{ $me }}</h1>

    <h3>{{ iprint('Hello laravel 1') }}</h3>

    <form method="POST" action="{{ route('todo.submit') }}">
        @csrf
        <input type="text" placeholder="input title" name="title" />
        <input type="text" placeholder="input body" name="body" />
        <input type="submit" value="submit-button" />
    </form>
    <ul>
        @foreach ($todo as $key => $value)
            <li>{{ $key }} : {{ $value->title }} - {{ $value->body }} ID:{{ $value->id }}
                <form method="POST" action="{{ route('todo.delete', $value->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('todo.update') }}">
        @csrf
        @method("PATCH")
        <input type="text" placeholder="input id" name="id" />
        <input type="text" placeholder="input title" name="title" />
        <input type="text" placeholder="input body" name="body" />
        <input type="submit" value="update-button" />
    </form>
    <script>
        // async function get(){
        //     let data = await fetch('http://train.todo.org/get_todo/9').then(res=>res.json());
        //     console.log(data);
        // }
        // get();
    </script>
</div>
@endsection
