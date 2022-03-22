@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Welcome <b>{{ Auth::user()->name }}</b>!</h4>
</div>
@endsection
