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

        $todo->save();

        return redirect('/');
    }
}
