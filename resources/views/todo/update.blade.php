@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h1>Update Todo {{$data->id}}</h1>
                <a href="{{ route('todo') }}">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" class="group-control" action="{{ route('todo.update',$data->id) }}">
                    @csrf
                    @method("PATCH")
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="input title" value="{{$data->title}}" name="title" required/>
                    <label>Body</label>
                    <input type="text" class="form-control" placeholder="input body" value="{{$data->body}} "name="body" required/>
                    <input type="submit" class="btn btn-primary"value="update-button" />
                </form>
            </div>
        </div>
    </div>
@endsection
