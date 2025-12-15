@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="mb-3">
        <a href="{{ route('machines.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Machines
        </a>
    </div>

    <h1 class="mb-4 text-center">Add New Machine</h1>

    <div class="d-flex justify-content-center">
        <div class="card" style="min-width: 400px;">
            <div class="card-body">
                <form method="POST" action="{{ route('machines.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Machine Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="manufacturer" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                    </div>
                    <input value="Save Machine" type="submit" class="btn btn-primary">
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection