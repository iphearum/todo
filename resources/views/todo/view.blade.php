@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h1>View Todo {{$data->id}}</h1>
                <a href="{{ route('todo') }}">Back</a>
            </div>
            <div class="card-body">
                <h3>{{$data->title}}</h3>
                <p>{{$data->body}}</p>
            </div>
        </div>
    </div>
@endsection
