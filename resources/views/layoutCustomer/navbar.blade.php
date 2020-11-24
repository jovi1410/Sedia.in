<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Sedia.in</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              @auth
              <div class="nav-item dropdown">
                <a class="nav-link js-scroll-trigger" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="{{ url('/tentang') }}">
                    Tentang
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </div>
              @else
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Masuk</a></li>
                @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Daftar</a></li>
                @endif
              @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
