<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{ route('home') }}">{{ $page->logo }}</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                @if (Route::has('login'))
                @auth
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#hero' : '#hero' }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#about' : '#about' }}">About</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#kamarcheck' : '#kamarcheck' }}">Kamar</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#contact' : '#contact' }}">Contact</a></li>
                <li><a class="nav-link scrollto {{ Str::startsWith(request()->route()->getName(), 'profile') ? 'active' : '' }}" href="{{ auth()->user()->role == 'admin' ? route('dashboard') : route('profile') }}">{{ Str::ucfirst(Auth()->user()->name) }}</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link scrollto"><li><a class="nav-link scrollto" style="margin-left: 5px;">Logout</a></li></button>
                </form>
                @else
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#hero' : '#hero' }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#about' : '#about' }}">About</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#kamarcheck' : '#kamarcheck' }}">Kamar</a></li>
                <li><a class="nav-link scrollto" href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#contact' : '#contact' }}">Contact</a></li>
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Sign in</a></li>
                @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->