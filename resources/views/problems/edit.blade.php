@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Problem</h2>

    <form action="{{ route('problems.update', $problem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $problem->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="5" class="form-control" required>{{ old('description', $problem->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Flag</label>
            <input type="text" name="flag" class="form-control" required value="{{ old('flag', $problem->flag) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" required value="{{ old('category', $problem->category) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Points</label>
            <input type="number" name="points" class="form-control" required value="{{ old('points', $problem->points) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Reference Link (optional)</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $problem->link) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @if($problem->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $problem->image) }}" alt="Problem Image" class="img-fluid rounded" style="max-height: 200px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('problems.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
