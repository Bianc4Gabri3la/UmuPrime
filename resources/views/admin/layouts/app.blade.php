<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'Painel - UmuPrime')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.imoveis.index') }}">UmuPrime - Admin</a>
    </div>
  </nav>
  <main class="container py-4">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
  </main>
  <footer class="text-center py-3">
    &copy; {{ date('Y') }} UmuPrime
  </footer>
</body>
</html>
