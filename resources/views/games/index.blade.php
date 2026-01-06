@extends('layouts.main')

@section('content')
<div class="container-fluid p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Games</h1>
        <form class="col" action="{{ route('games.index') }}" method="GET">
            <select name="machine_id" class="form-select" aria-label="Filter by Machine">
                <option value="">Filter by Machine</option>
                @foreach ($machines as $machine)
                <option value="{{ $machine->id }}" {{ request('machine_id')==$machine->id ? 'selected' : '' }}>
                    {{ $machine->name }}</option>
                @endforeach
            </select>
    
            <select name="sort" class="form-select" aria-label="Sort by date released">
                <option value="">Sort by Release Date</option>
                <option value="asc" {{ request('sort')=='asc' ? 'selected' : '' }}>Oldest to Newest</option>
                <option value="desc" {{ request('sort')=='desc' ? 'selected' : '' }}>Newest to Oldest</option>
            </select>
    
            <input type="submit" class="btn btn-primary mt-2" value="Query">
        </form>
        <a href="{{ route('games.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Add New Game
        </a>
    </div>

    
    <div class="table-responsive">

        @if ($message = session('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif

        <div class="d-flex flex-wrap gap-3">
            @foreach ($games as $game)
            <div class="card m-3" style="width: 18rem;">
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

                    <a href={{ route('games.show', $game->id) }} class="btn btn-primary">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection