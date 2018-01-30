<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
    	return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
    	$todo = new Todo;
        $todo->todo = $request->todo;
    	$todo->save();
        Session::flash('Success', 'Your Todo was created!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        Session::flash('Success', 'Your Todo was deleted!');
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('Success', 'Your Todo was updated!');
        return redirect()->route('todos');
    }
    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        Session::flash('Success', 'Your Todo was marked as completed!');
        return redirect()->back();
    }

}
