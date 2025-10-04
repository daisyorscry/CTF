@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Problem List</h2>
        <a href="{{ route('problems.create') }}" class="btn btn-primary">+ Add Problem</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Points</th>
                <th>Link</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($problems as $problem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $problem->title }}</td>
                <td>{{ $problem->category }}</td>
                <td>{{ $problem->points }}</td>
                <td>
                    @if($problem->link)
                        <a href="{{ $problem->link }}" target="_blank">Visit</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($problem->image)
                        <img src="{{ asset('storage/' . $problem->image) }}" alt="img" width="60" height="60" class="rounded">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('problems.edit', $problem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('problems.destroy', $problem->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this problem?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
