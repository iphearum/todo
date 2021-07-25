@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $todo_index }}</h2>
        <div class="card">
            <div class="card-title">
                <h1>View Todo {{ $data->id }}</h1>
                <a href="{{ route('todo') }}">Back</a>
            </div>
            <div class="card-body">
                <h3>{{ $data->title }}</h3>
                <p>{{ $data->body }}</p>

                <h3>Posted by {{ $data->user->name }}</h3>
            </div>
        </div>
    </div>
@endsection
