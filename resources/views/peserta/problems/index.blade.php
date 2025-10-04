@extends('layouts.app')

@section('title','Daftar Soal CTF')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Challenge CTF</h1>
</div>

@if($problems->isEmpty())
    <div class="alert alert-info">Belum ada soal tersedia.</div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-3">
        @foreach($problems as $p)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $p->title }}</h5>
                    <p class="card-text text-muted mb-1"><strong>Kategori:</strong> {{ $p->category ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Poin:</strong> {{ $p->points }}</p>
                    <p class="card-text text-truncate" style="max-height:3.6rem;">
                        {!! nl2br(e(Str::limit($p->description, 200))) !!}
                    </p>

                    <div class="mt-auto d-flex justify-content-end">
                        <a href="{{ route('peserta.problems.show', $p->id) }}" class="btn btn-sm btn-outline-primary">Buka Soal</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination jika pakai paginate --}}
    @if(method_exists($problems,'links'))
        <div class="mt-3 d-flex justify-content-center">
            {{ $problems->links() }}
        </div>
    @endif
@endif
@endsection
