<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    // Get all todos
    public function index() {
        // Get todos from ORM
        $todos = Todo::where('user', Auth::user()->id)->latest()->get();

        // Return index with todos
        return view('index', ['todos' => $todos]);
    }

    // Add new task
    public function add() {
        // Init a Todo
        $todo = new Todo();

        // Add variables
        $todo->name = request('todo');
        $todo->user = Auth::user()->id;
        $todo->status = false;

        // Insert in database
        $todo->save();

        // Return index
        return redirect('/');
    }

    // Update task
    public function update($id) {
        // Find or return 404
        $todo = Todo::findOrFail($id);

        // Change task name
        $todo->name = request('todo');

        // Update it
        $todo->update();

        // Return index
        return redirect('/');
    }

    // Delete task
    public function delete($id) {
        // Find or return 404
        $todo = Todo::findOrFail($id);

        // Delete task
        $todo->delete();

        // Return index
        return redirect('/');
    }

    // Change status to not
    public function not($id) {
        // Find or return 404
        $todo = Todo::findOrFail($id);

        // Change to false | not
        $todo->status = false;

        // Update
        $todo->update();

        // Return index
        return redirect('/');
    }

    // Change status to done
    public function done($id) {
        // Find or return 404
        $todo = Todo::findOrFail($id);

        // Change to true | done
        $todo->status = true;

        // Update
        $todo->update();

        // Return index
        return redirect('/');
    }
}
