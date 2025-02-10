<!-- footer start -->
<footer style="background-color: #000000;">
    <div class="container">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-3 col-sm-5 d-flex flex-column align-items-center gap-3">
                <img src="{{ asset('./assets/icon/logo7.png') }}" alt="..." style="width: 100px;">
                <img src="{{ asset('./assets/icon/ayoCerita_white.png') }}" alt="..." style="width: 200px;">
            </div>
            <div class="col-md-2 col-sm-5 mt-3" style="line-height: 10px; color: #ffffff;">
                <h4 class="fw-bold mb-4">Navigasi</h4>
                <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                    <p>Halaman Utama</p>
                </a>
                <a href="{{ route('dashboard') }}#layanan" class="text-decoration-none text-white">
                    <p>Layanan</p>
                </a>
                <p>Sumber Informasi</p>
            </div>
            <div class="col-md-2 col-sm-5 mt-3" style="line-height: 10px; color: #ffffff;">
                <h4 class="fw-bold mb-4">Tentang</h4>
                <p><a href="https://mail.google.com/mail/?view=cm&fs=1&to=ayocerita.team@gmail.com" class="text-decoration-none text-white">Email</a></p>
                <p>Alamat</p>
                <p>Nomor Telepon</p>
            </div>
            <div class="col-md-2 col-sm-5 mt-3" style="line-height: 10px; color: #ffffff;">
                <h4 class="fw-bold mb-4">Psikolog</h4>
                <p>Daftar Psikolog</p>
                @if (Auth::check())
                <a href="{{ route('auth.logout.regisPsi') }}" class="btn btn-warning fw-medium"><img src="{{ asset('assets/icon/selfcare.png') }}" alt="..." style="width: 30px"> Daftar</a>
                @else
                <a href="{{ route('psi.register') }}" class="btn btn-warning fw-medium"><img src="{{ asset('assets/icon/selfcare.png') }}" alt="..." style="width: 30px"> Daftar</a>
                @endif
            </div>
            <div class="col-md-2 col-sm-5 mt-3 d-flex flex-column align-items-center">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ayocerita.team@gmail.com">
                    <img src="{{ asset('./assets/icon/mail_white.png') }}" alt="..." style="width: 30px;" class="mt-1 mb-3">
                </a>
                <img src="{{ asset('./assets/icon/ig_white.png') }}" alt="..." style="width: 30px;" class="mb-3">
                <img src="{{ asset('./assets/icon/yt_white.png') }}" alt="..." style="width: 30px;">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-center text-white">Hak Cipta &copy; 2023 Copyright Ayo Cerita!</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
