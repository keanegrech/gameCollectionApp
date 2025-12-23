@extends('layouts.main')

@section('content')
<div class="container-fluid p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Games</h1>
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

        <pre style="color: white">
            {{ $games }}
        </pre>

    </div>
</div>
@endsection