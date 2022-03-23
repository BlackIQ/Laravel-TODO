<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::where('user', Auth::user()->id)->latest()->get();

        return view('index', ['todos' => $todos]);
    }

    public function add() {
        $todo = new Todo();

        $todo->name = request('todo');
        $todo->user = Auth::user()->id;
        $todo->status = false;

        $todo->save();

        return redirect('/');
    }

    public function update($id) {
        $todo = Todo::findOrFail($id);

        $todo->name = request('todo');

        $todo->update();

        return redirect('/');
    }

    public function delete($id) {
        $todo = Todo::findOrFail($id);

        $todo->delete();

        return redirect('/');
    }

    public function not($id) {
        $todo = Todo::findOrFail($id);

        $todo->status = false;

        $todo->update();

        return redirect('/');
    }

    public function done($id) {
        $todo = Todo::findOrFail($id);

        $todo->status = true;

        $todo->update();

        return redirect('/');
    }
}
