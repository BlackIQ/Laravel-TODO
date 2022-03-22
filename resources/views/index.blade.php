@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome <b>{{ Auth::user()->name }}</b>!</h1>
    <br>
    @foreach ($todos as $todo)
        <p>{{ $todo->name }}</p>
    @endforeach
</div>
@endsection
