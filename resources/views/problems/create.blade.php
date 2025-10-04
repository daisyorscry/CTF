@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Problem</h2>

    <form action="{{ route('problems.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Flag</label>
            <input type="text" name="flag" class="form-control" required value="{{ old('flag') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" required value="{{ old('category') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Points</label>
            <input type="number" name="points" class="form-control" required value="{{ old('points') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Reference Link (optional)</label>
            <input type="url" name="link" class="form-control" value="{{ old('link') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Problem</button>
        <a href="{{ route('problems.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
