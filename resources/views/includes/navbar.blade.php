<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white b-2">
        <a href="/" class="navbar-brand">
            <img src="{{ url('frontend/images/logo.png') }}" alt="logo TravelNow">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-md-2">
                    <a href="/" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#popular" class="nav-link">Paket Travel</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Link</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonial</a>
                </li>
            </ul>
            @guest
                <!-- Mobile Button -->
                <form class="d-sm-block d-lg-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('/login') }}';">
                        Masuk
                    </button>
                </form>
                <!-- Desktop Button -->
                <form class="d-none d-lg-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('/login') }}';">
                        Masuk
                    </button>
                </form>
            @endguest

            @auth
                <!-- Mobile Button -->
                <form class="d-sm-block d-lg-none" action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0">
                        Keluar
                    </button>
                </form>
                <!-- Desktop Button -->
                <form class="d-none d-lg-block" action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Keluar
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>
