@extends('layouts.app')

@section('title', $problem->title)

@section('content')
<div class="container mt-4">
    <h1>{{ $problem->title }}</h1>
    <p><strong>Kategori:</strong> {{ $problem->category ?? 'N/A' }}</p>
    <p><strong>Poin:</strong> {{ $problem->points }}</p>
    <p>{!! nl2br(e($problem->description)) !!}</p>

    <form action="{{ route('peserta.submit.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="flag" class="form-label">Masukkan Flag</label>
            <input type="hidden" name="problem_id" value="{{ $problem->id }}">
            <input type="text" name="flag" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit Flag</button>
    </form>
</div>
@endsection
