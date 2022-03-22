@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome <b>{{ Auth::user()->name }}</b>!</h1>
    <br>
    <form action="/add" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-11">
                <input class="form-control" name="todo" placeholder="TODO name" id="todo" required>
            </div>
            <div class="col-md-1">
                <button class="w-100 btn btn-primary">Add</button>
            </div>
        </div>
        <br>
    </form>
    <br>
    @foreach ($todos as $todo)
        <div class="todo">
            <h4>
                {{ $todo->name }}
                <div class="float-end">
                    <button class="btn btn-primary editing">Edit</button>
                    <button class="btn btn-link text-danger"><i class="fa fa-trash"></i></button>
                </div>
            </h4>
            <div class="edit" style="display: none;">
                <br>
                <form action="/update/{{ $todo->id }}" method="POST">
                    @csrf
                    <label for="todo" class="form-label">Todo name</label>
                    <input class="form-control" name="todo" placeholder="TODO name" id="todo" value="{{ $todo->name }}" required>
                    <br>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <br>
    @endforeach
</div>
@endsection
