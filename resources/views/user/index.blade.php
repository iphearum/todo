@extends('layout')

@section('content')
<div class="center">
    <h1>Creat user</h1>
    <form method="POST" action="{{ route('user.submit') }}">
        @csrf
        <input type="text" placeholder="input name" name="name" /><br>
        <input type="text" placeholder="input email" name="email" /><br>
        <input type="text" placeholder="input password" name="password" /><br>
        <input type="submit" value="submit-button" />
    </form>
</div>

@endsection
