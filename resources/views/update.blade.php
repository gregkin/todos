@extends('layout')

@section('content')

    <div class="row">
        <div class = "col-lg-12 ">
            <div class="form-group">
                <form action ="{{ route('todos.save',['id' => $todo->id ]) }}" method="post">
                    {{ csrf_field() }}
                    <input class="form-control input-lg" type="text" name="todo" value="{{ $todo->todo }}">
                </form>    
            </div>
        </div>
    </div>
    <hr>
    
@stop