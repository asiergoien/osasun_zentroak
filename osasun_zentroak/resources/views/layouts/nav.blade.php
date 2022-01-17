<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">  
            <img src="img/Logo.png" alt="" width="250" height="30">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/osasun-zentroak">Osasun zentroak</a>
                </li>
            </ul>
            <div class="d-flex">
                @guest
                @if (Route::has('login'))
                <a class="nav-link" href="{{ route('login') }}">{{ __('Logeatu') }}</a>
                @endif
  
                @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Erregistroa') }}</a>
                @endif
                @else
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-left gap-3" href="/">
                                <span>Profila</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-left gap-2" href="/">
                                <span>Gustokoenak</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-left gap-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>Saioa itxi </span>
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @endguest
                
            </div>
        </div>
    </div>
  </nav>