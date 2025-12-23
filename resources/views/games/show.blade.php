@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">

    @if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('games.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Games
        </a>
    </div>

    <h1 class="mb-4">Game {{ $game->id }}</h1>

    <div class="mb-3">
        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit Game
        </a>
        <a href="{{ route('games.destroy', $game->id) }}" class="btn btn-danger ms-2 btn-delete">
            <i class="fa fa-times"></i> Delete Game
        </a>
    </div>

    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h1 class="card-title">
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
                    <strong>Release Date:</strong> {{ $game->release_date }}
                </p>

                <p class="card-text">
                    <strong>Machine:</strong> {{ $game->machine->name }}
                </p>
                <p class="card-text">
                    <strong>Percent Complete:</strong> {{ $game->percent_complete }}%
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">
                    <div class="progress-bar" style="width: {{ $game->percent_complete }}%"></div>
                </div>

        </div>
    </div>


    <h2 class="mt-5 mb-3">Latest News from Steam</h2>
    <div class="d-flex flex-wrap gap-3">


        @foreach ($newsItems as $newsItem)

        <div class="card mr-3" style="flex: 1 1 300px;">
            <div class="card-body d-flex flex-column">
                <h6>{{ $newsItem['feedlabel'] }}</h6>
                <h5 class="card-title">{{ $newsItem['title'] }}</h5>
                <p class="card-text text-secondary">
                    {{ $newsItem['contents'] }}
                </p>

                @if ($newsItem['url'])
                <a href="{{ $newsItem['url'] }}" class="btn btn-primary mt-auto">
                    Read More
                </a>
                @endif

            </div>
        </div>
        @endforeach
    </div>
</div>

@include('games._delete')

@endsection