@extends('layouts.app')

@section('title', $problem->title)

@section('content')
<div class="container">
    <h2>{{ $problem->title }}</h2>
    <p><strong>Category:</strong> {{ $problem->category }}</p>
    <p><strong>Points:</strong> {{ $problem->points }}</p>

    <div class="mb-3">
        {!! nl2br(e($problem->description)) !!}
    </div>

    @if($problem->link)
        <p><a href="{{ $problem->link }}" target="_blank" class="btn btn-info btn-sm">Challenge Link</a></p>
    @endif

    @if($problem->image)
        <div class="mb-3">
            <img src="{{ asset('storage/'.$problem->image) }}" alt="Problem Image" class="img-fluid rounded">
        </div>
    @endif

    <form action="{{ route('submit.flag') }}" method="POST" class="row g-2 mt-4">
        @csrf
        <input type="hidden" name="problem_id" value="{{ $problem->id }}">
        <div class="col-9">
            <input type="text" name="flag" class="form-control" placeholder="musly{...}" required>
        </div>
        <div class="col">
            <button class="btn btn-success w-100">Submit</button>
        </div>
    </form>
</div>
@endsection
