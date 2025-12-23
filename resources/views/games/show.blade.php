@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="mb-3">
        <a href="{{ route('games.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Games
        </a>
    </div>

    <h1 class="mb-4">{{ $game->title }}</h1>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                {{ $game->title }}
            </h5>

            <p class="card-text">
                {{ $game->description }}
            </p>

            <hr />

            <p class="card-text">
                <strong>Developer:</strong> {{ $game->developer }}
            </p>

            <p class="card-text">
                <strong>Percent Complete:</strong> {{ $game->percent_complete }}%
            </p>

            <p class="card-text">
                <strong>Release Date:</strong> {{ $game->release_date }}
            </p>

            <p class="card-text">
                <strong>Machine:</strong> {{ $game->machine->name }}
            </p>

        </div>
    </div>

</div>

@endsection