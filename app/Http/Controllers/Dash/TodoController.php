<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dash\Todo;

class TodoController extends Controller
{


    public function index()
    {
        $todos = Todo::latest()->paginate(5);

        return view('dash.index', compact('todos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('dash.todo.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required',
            'description' => 'required',

        ]);

        Todo::create($request->all());

        return redirect()->route('dash.todos.index')
            ->with('success', 'Product created successfully.');
    }


    public function show(Todo $todo)
    {
        return view('dash.todo.show', compact('todo'));
    }



    public function edit(Todo $todo)
    {
        return view('dash.todo.edit', compact('todo'));
    }



    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'todo' => 'required',
            'description' => 'required',
        ]);

        $todo->update($request->all());

        return redirect()->route('dash.todos.index')
            ->with('success', 'Product updated successfully');
    }



    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('dash.todos.index')
            ->with('success', 'Product deleted successfully');
    }
}
