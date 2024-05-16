<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //Index Function 
    public function index()
    {
        //Get List of data from database
        $todos = Todo::orderBy('complete')->get();
        return view('todos.index')->with(['todos' => $todos]);
    }

    //Create Function
    public function create()
    {
        return view('todos.create');
    }

    //Edit Function Todo List
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    //Update Function Todo List
    public function update(Request $request, Todo $todo)
    {
        //Validate Input Data
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $todo->update(['title' => $request->title]);

        return redirect(route('todo.index'))->with('message', 'Update Successfully');
    }


    ///Create Function to Database
    public function store(Request $request)
    {
        //Validate Input Data
        $request->validate([
            'title' => 'required|max:255'
        ]);

        //Create to DB
        Todo::create($request->all());
        // Redirect Self Page 
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }

    //Complete Function Todo List
    public function complete(Todo $todo)
    {
        //update true to complete
        $todo->update(['complete' => true]);

        return redirect()->back()->with('message', 'Task Completed');
    }

    //Reverse complete Function Todo List
    public function incomplete(Todo $todo)
    {
        //update false to complete
        $todo->update(['complete' => false]);

        return redirect()->back()->with('message', 'Task reverse to incomplet');
    }

    //Delete Function Todo List
    public function delete(Todo $todo)
    {
        //update false to complete
        $todo->delete();

        return redirect()->back()->with('message', 'Delete Task Successfully');
    }
}
