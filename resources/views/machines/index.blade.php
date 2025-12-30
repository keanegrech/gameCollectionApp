@extends('layouts.main')

@section('content')

<div class="container-fluid p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Machines</h1>
        <a href="{{ route('machines.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Add New Machine
        </a>
    </div>

    <div class="table-responsive">

        @if ($message = session('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif

        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center" style="width: 50px;">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $machine)
                <tr>
                    <th scope="row" class="text-center fw-normal">{{ $machine->id }}</th>
                    <td>{{ $machine->name }}</td>
                    <td>{{ $machine->manufacturer }}</td>
                    <td style="white-space: nowrap;">
                        <a href={{ route('machines.show', $machine->id) }} class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i> View
                        </a>
                        <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href={{ route('machines.destroy', $machine->id) }} class="btn-delete btn btn-sm btn-danger">
                            <i class="fa fa-times"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @include('shared._delete')

    </div>
</div>

@endsection