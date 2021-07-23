@extends('layout')

@section('content')
    <div class="center">
        <h1>Creat user</h1>
        <h2>{{ $todo_index }}</h2>
        <h3>{{ $todo_1 }}</h3>
        <form method="POST" action="{{ route('user.submit') }}">
            @csrf
            <input type="text" placeholder="input name" name="name" /><br>
            <input type="text" placeholder="input email" name="email" /><br>
            <input type="text" placeholder="input password" name="password" /><br>
            <input type="submit" value="submit-button" />
        </form>
        <ul>
            @foreach ($todos as $item)
                <li>{{ $item->title }}</li>
            @endforeach
        </ul>
    </div>

@endsection
