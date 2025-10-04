<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'MuslyCTF')</title>

    <!-- Bootstrap 5 CDN (quick) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Alpine (optional if Breeze/Alpine used) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { padding-top: 70px; }
        .flag-input { font-family: monospace; letter-spacing: .05em; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">MuslyCTF</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('peserta.problems.index') }}">Problems</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('peserta.scoreboard.index') }}">Scoreboard</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('peserta.teams.index') }}">Teams</a></li>

        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('problems.create') }}">Create Problem</a></li>
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto">
        @guest
          @if(Route::has('login'))
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          @endif
          @if(Route::has('register'))
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @endif
        @else
          <li class="nav-item"><span class="nav-link">Hello, {{ auth()->user()->name }}</span></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-link nav-link" style="display:inline;padding:0;border:0;">Logout</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-warning">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Page content --}}
    @yield('content')
</div>

<footer class="mt-5 py-4 bg-light text-center">
    <div class="container">
        <small>MuslyCTF — Built with Laravel • {{ date('Y') }}</small>
    </div>
</footer>
</body>
</html>
