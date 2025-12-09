@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="mb-3">
        <a href="{{ route('machines.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Machines
        </a>
    </div>

    <h1 class="mb-4">Machine {{ $machine->id }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $machine->name }}</h5>
            <p class="card-text">Manufacturer: {{ $machine->manufacturer }}</p>
        </div>
    </div>

    <div class="mb-3">
        <a href="#" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit Machine
        </a>
        <a href="#" class="btn btn-danger ms-2">
            <i class="fa fa-times"></i> Delete Machine
        </a>
    </div>
</div>

@endsection
