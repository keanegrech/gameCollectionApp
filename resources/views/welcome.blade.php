@extends('layouts.main')

@section('content')
<div class="container m-4">
    <h1>
        <strong>
            Welcome to the Game Collection App
        </strong>
    </h1>
    <h2>Organize your games and machines with ease</h2>
    <a href="{{ route('machines.index') }}" class="btn btn-primary mb-3 ms-2">
        Machines
    </a>
    <a href="{{ route('games.index') }}" class="btn btn-primary mb-3">
        Games
    </a>
</div>
@endsection