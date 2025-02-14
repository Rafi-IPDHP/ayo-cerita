<!-- nav start -->
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-black px-3 myNav" style="font-family: 'poppins';">
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <div class="col d-flex">
                <ul class="navbar-nav mx-auto gap-4 mt-2 mt-lg-0 fw-semibold">
                    @can('isPsikolog')
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'psi' && Request::segment(2) != 'profile') active @endif" href="{{ route('psi.dashboard', ['psikolog_id' => Auth::user()->psikolog->id]) }}">Beranda</a>
                    </li>
                    @endcan
                    @cannot('isPsikolog')
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == '') active @endif" href="{{ route('dashboard') }}" aria-current="page">Beranda<span class="visually-hidden">(current)</span></a>
                    </li>
                    @endcannot
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'mental-test') active @endif" href="{{ route('mental_test.index') }}">Mental Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'tentang-kami') active @endif" href="{{ route('dashboard') }}#tentangKami">Tentang Kami</a>
                    </li>
                    @cannot('isPsikolog')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}#artikel">Artikel</a>
                    </li>
                    @endcannot
                    @can('isPsikolog')
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(2) == 'profile') active @endif" href="{{ route('profile.psikolog', ['psikolog_id' => Auth::user()->psikolog->id]) }}">Profile</a>
                    </li>
                    @endcan
                </ul>
            </div>
            <form class="d-flex my-2 my-lg-0">
                @if (Auth::check())
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger my-2 my-sm-0 px-4 fw-semibold">Keluar</a>
                @else
                    @if (Request::segment(1) == 'login')
                        <a href="{{ route('auth.register') }}" class="btn my-2 my-sm-0 px-4 fw-semibold" style="color: black; background-color: #fff640;">Daftar</a>
                    @else
                        <a href="{{ route('auth.login') }}" class="btn my-2 my-sm-0 px-4 fw-semibold" style="color: black; background-color: #fff640;">Masuk</a>
                    @endif
                @endif
            </form>
        </div>
    </div>
</nav>
<!-- nav end -->
