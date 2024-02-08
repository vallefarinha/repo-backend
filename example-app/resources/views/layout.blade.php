<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--CASO QUEIRA USAR UM CSS ESPECIFICO NAS VIEWS. AQUI EXPORTA -->
    @yield('css')
</head>

<body>
    <nav class=" navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <a class="navbar-brand" href="{{config('app.name')}}">
            <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            Bootstrap
        </a>


        <ul class="nav justify-content-end">

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About</a>
            </li>
            @endauth
        </ul>

    </nav>

    <div class="text-center">
        @yield('content')
    </div>

    <div class="container">
        <hr>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 Company, Inc</p>
        </footer>
    </div>

</body>

</html>