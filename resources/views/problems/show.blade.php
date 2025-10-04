@extends('layouts.app')

@section('title',$problem->title)

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $problem->title }}</h1>
        <p class="text-muted"><strong>Category:</strong> {{ $problem->category ?? 'N/A' }} • <strong>Points:</strong> {{ $problem->points }}</p>

        <div class="card mb-3">
            <div class="card-body">
                {!! nl2br(e($problem->description)) !!}
            </div>
        </div>

        @auth
        <div class="card mb-3">
            <div class="card-body">
                <h5>Submit Flag</h5>
                <form action="{{ route('submit.flag') }}" method="POST" class="row g-2">
                    @csrf
                    <input type="hidden" name="problem_id" value="{{ $problem->id }}">
                    <div class="col-9">
                        <input type="text" name="flag" class="form-control flag-input" placeholder="musly{...}" required>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
                <small class="text-muted d-block mt-2">Submissions are logged — duplicates of solved problems won't award extra points.</small>
            </div>
        </div>
        @else
            <div class="alert alert-info">
                Please <a href="{{ route('login') }}">login</a> to submit flags.
            </div>
        @endauth
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h6>Problem Info</h6>
                <p class="mb-1"><strong>ID</strong> {{ $problem->id }}</p>
                <p class="mb-1"><strong>Visible</strong> {{ $problem->visible ? 'Yes' : 'No' }}</p>
                <p class="mb-1"><strong>Created</strong> {{ $problem->created_at->diffForHumans() }}</p>
            </div>
        </div>

        {{-- optional: list of previous submissions by user for this problem --}}
        @auth
        <div class="card">
            <div class="card-body">
                <h6>Your recent submissions</h6>
                @php
                    $subs = \App\Models\Submission::where('user_id', auth()->id())->where('problem_id', $problem->id)->latest()->limit(5)->get();
                @endphp

                @if($subs->isEmpty())
                    <p class="text-muted mb-0">No submissions yet.</p>
                @else
                    <ul class="list-unstyled mb-0">
                        @foreach($subs as $s)
                            <li>
                                <small class="d-block">{{ $s->created_at->format('Y-m-d H:i') }} — <span class="fw-bold">{{ $s->correct ? 'CORRECT' : 'WRONG' }}</span></small>
                                <div class="text-truncate flag-input">{{ $s->submitted_flag }}</div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @endauth
    </div>
</div>
@endsection
