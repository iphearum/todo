<div>
    <h1>Todo {{ $me }}</h1>
    <p>{{ $hello }}</p>

    <form method="POST" action="{{ route('todo.submit') }}">
        @csrf
        <input type="text" placeholder="input title" name="title" />
        <input type="text" placeholder="input body" name="body" />
        <input type="submit" value="submit-button" />
    </form>

    <ul>
        @foreach ($todo as $key => $value)
            <li>{{ $key }} : {{ $value->title }} - {{ $value->body }} ID:{{ $value->id }}
                <a href="{{ route('todo.delete', $value->id) }}">DELETE</a>
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
</div>
