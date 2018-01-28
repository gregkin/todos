@extends('layout')

@section('content')
    <div class="row">
        <div class = "col-lg-6 col-lg-offset-3 center">
            <form action ="/create/todo" method="post">
                {{ csrf_field() }}
                <input class="form-control input-lg" type="text" name="todo" placeholder="Create a New Todo">
            </form>
        </div>
    </div>
    <hr>
    @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class = "btn btn-danger btn-xs">x</a>

        <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class = "btn btn-info btn-xs"> Update</a>
        <hr>
        @endforeach
@stop
                