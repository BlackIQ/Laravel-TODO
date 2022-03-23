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
    @if ($todos)
        @foreach ($todos as $todo)
            <div class="todo">
                <h4>
                    @if ($todo->status == true)
                        <input type="checkbox" class="form-check-input" onclick="event.preventDefault(); document.getElementById('not-form').submit();" checked>
                        <s>{{ $todo->name }}</s>
                        <form action="/not/{{ $todo->id }}" id="not-form" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <input type="checkbox" class="form-check-input" onclick="event.preventDefault(); document.getElementById('done-form').submit();">
                        {{ $todo->name }}
                        <form action="/done/{{ $todo->id }}" id="done-form" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                    <div class="float-end">
                        <button class="btn btn-primary editing">Edit</button>
                        <button class="btn btn-link text-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i></button>
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
                <form action="/delete/{{ $todo->id }}" id="delete-form" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <br>
        @endforeach
    @else
        <h4>No TODO is added yet.</h4>
    @endif
</div>
@endsection
