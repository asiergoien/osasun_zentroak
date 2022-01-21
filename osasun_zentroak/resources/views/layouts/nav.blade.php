<head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/index">
            <img src="img/logo_white.png" alt="" width="250" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="/osasun-zentroak">Guztiak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                        href="/osasun-zentroak?probintzia=Bizkaia">Bizkaia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                        href="/osasun-zentroak?probintzia=Gipuzkoa">Gipuzkoa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                        href="/osasun-zentroak?probintzia=Araba">Araba</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <div class="d-flex">
                @guest
                    @if (Route::has('login'))
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Saioa hasi') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Erregistroa') }}</a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown- toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Illuminate\Support\Facades\Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-left gap-2" href="/profila">
                                    <span>Profila</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-left gap-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span>Saioa itxi </span>
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest

                <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                <lord-icon src="https://cdn.lordicon.com/hdiorcun.json" trigger="loop"
                    colors="primary:#121331,secondary:#ffffff" style="width:40px;height:40px">
                </lord-icon>
            </div>
        </div>
    </div>
</nav>

<main id="app">
    @yield('content')
</main>
