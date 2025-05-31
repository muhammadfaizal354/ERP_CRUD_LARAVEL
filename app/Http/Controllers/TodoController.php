<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
            'complete' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo berhasil diperbarui');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

    return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus');
    }

}
