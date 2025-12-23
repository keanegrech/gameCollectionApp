@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="mb-3">
        <a href="{{ route('machines.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Machines
        </a>
    </div>

    <h1 class="mb-4 text-center">Edit Machine</h1>

    <div class="d-flex justify-content-center">
        <div class="card" style="min-width: 400px;">
            <div class="card-body">
                <form method="POST" action="{{ route('machines.update', $machine->id) }}">
                    @csrf
                    @method('PUT')
                    @include('machines._form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection