<!-- Navbar-->
<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('/frontend/icons/logo.svg') }}" alt="logo">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link {{ set_active('home') }}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link {{ set_active('travel') }}" href="{{ route('travel') }}">Paket Travel</a>
                </li>
                <li class="nav-item mx-md-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item {{ set_active('orders') }}" href="{{ route('orders') }}">Pemesanan Travel</a>
                        <a class="dropdown-item" href="#">Passport</a>
                        <a class="dropdown-item" href="#">VISA</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="#testimonial"  onclick="scrollToSectionTestimonial()">Testimonial</a>
                </li>

                @guest
                <form class="form-inline d-md-none d-sm-block">
                    <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}'">Masuk</button>
                </form>

                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}'">Masuk</button>
                </form>
                @endguest

                @auth
                <form class="form-inline d-md-none d-sm-block" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-login my-2 my-sm-0" type="submit">Keluar</button>
                </form>

                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">Keluar</button>
                </form>
                @endauth
            </ul>
        </div>
    </nav>
</div>