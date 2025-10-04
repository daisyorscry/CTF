@extends('layouts.app')

@section('title', 'Halaman Peserta')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Selamat Datang, {{ Auth::user()->name }}</h1>
    <p>Berikut daftar challenge CTF yang bisa kamu coba:</p>

    <a href="{{ route('peserta.problems.index') }}" class="btn btn-primary">Lihat Semua Soal</a>
</div>
@endsection
