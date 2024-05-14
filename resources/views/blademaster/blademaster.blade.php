<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-info mb-3"> 
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h3>Marketplace</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> 
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login.create') }}"><h5>Login</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('register.daftar') }}"><h5>Register</h5></a>
                        </li>
                    @endguest
    
                    @auth
                        @if (auth()->user()->role == 'superadmin')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('manage.products') }}"><h5>Manage Products</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('manage.users') }}"><h5>Manage Users</h5></a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <h5>Logout</h5></a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('navbar')

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
    
    
      {{-- end navbar --}}
