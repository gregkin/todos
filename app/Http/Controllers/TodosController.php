<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()

    {

    	$todos = Todo::all();
    	return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)

    {
    	// dd($request->all());
    	//This is like a new row in the table
    	
    	   $todo = new Todo;

    	   $todo->todo = $request->todo;
    	//Saving the data to the db.
    	   $todo->save();
    	//Redirect the user
    	   return redirect()->back();

    }

    public function delete($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

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

         return redirect()->route('todos');
    }

}
