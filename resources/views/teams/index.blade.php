@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Problem</h2>
        <a href="{{ route('problems.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Problem
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Poin</th>
                <th>Gambar</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($problems as $problem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $problem->title }}</td>
                    <td>{{ $problem->category }}</td>
                    <td>{{ $problem->points }}</td>
                    <td>
                        @if($problem->image)
                            <img src="{{ asset('storage/' . $problem->image) }}" alt="img" width="70" class="rounded">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        @if($problem->link)
                            <a href="{{ $problem->link }}" target="_blank" class="text-primary">Buka</a>
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('problems.edit', $problem->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('problems.destroy', $problem->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus problem ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">Belum ada problem</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
