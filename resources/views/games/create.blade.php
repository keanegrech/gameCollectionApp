@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="mb-3">
        <a href="{{ route('games.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Games
        </a>
    </div>

    <h1 class="mb-4 text-center">Add New Game</h1>
    <div class="d-flex justify-content-center">
        <div class="card" style="min-width: 400px;">
            <div class="card-body">
                <form method="POST" action="{{ route('games.store') }}">
                    @csrf
                    @include('games._form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection