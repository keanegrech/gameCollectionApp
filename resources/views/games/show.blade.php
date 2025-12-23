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

    <h2 class="mt-5 mb-3">Screenshots</h2>
    <form action="{{ route('screenshots.store', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="screenshots[]" multiple class="form-control mb-3" />
        <input type="submit" value="Upload Screenshots" class="btn btn-primary mb-3" />
    </form>

    <div class="mx-auto" style="max-width: 600px;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($screenshots as $screnshot)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ $screnshot->getBase64ImageAttribute() }}" class="d-block w-100" alt="{{ $screnshot->alt_text }}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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