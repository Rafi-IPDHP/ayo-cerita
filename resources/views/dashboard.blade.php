@extends('templates.main')

@push('css')
<style>
    .myNav {
        background: rgba(0, 0, 0, 0.35);
        transition: 0.3s ease-in-out;
    }

    .nav-active {
        background: transparent;
    }

    .bottom-animation {
        /* position: absolute; */
        animation-name: bottom-animation;
        animation-duration: 1.3s;
        animation-timing-function: ease-out;
    }

    @keyframes bottom-animation {
        0%   {bottom:-150px;}
        100% {bottom:0px;}
    }

    .reveal-bottom{
        position: relative;
        transform: translateY(100px);
        opacity: 0;
        transition: 2s all ease;
    }
    .reveal-bottom.active{
        transform: translateY(0);
        opacity: 1;
    }

    .reveal-left{
        position: relative;
        transform: translateX(-150px);
        opacity: 0;
        transition: 2s all ease;
    }

    .reveal-left.active{
        transform: translateX(0);
        opacity: 1;
    }

    .reveal-left2{
        position: relative;
        transform: translateX(-100px);
        opacity: 0;
        transition: 2s all ease;
    }

    .reveal-left2.active{
        transform: translateX(0);
        opacity: 1;
    }

    .reveal-right{
        position: relative;
        transform: translateX(150px);
        opacity: 0;
        transition: 2s all ease;
    }

    .reveal-right.active{
        transform: translateX(0);
        opacity: 1;
    }

    .reveal-right2{
        position: relative;
        transform: translateX(100px);
        opacity: 0;
        transition: 2s all ease;
    }

    .reveal-right2.active{
        transform: translateX(0);
        opacity: 1;
    }
</style>
@endpush

@section('content')

    <!-- nav start -->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top px-3 myNav" style="font-family: 'poppins';">
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
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(1) == '') active @endif" href="{{ route('dashboard') }}" aria-current="page">Beranda<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'mental-test') active @endif" href="{{ route('mental_test.index') }}">Mental Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(1) == 'tentang-kami') active @endif" href="{{ route('dashboard') }}#tentangKami">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}#artikel">Artikel</a>
                        </li>
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

    <!-- carousel start -->
    <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/img/home1.png') }}" class="d-block w-100 img-fluid" alt="..." style="height: 643px;">
            <div class="carousel-caption d-none d-md-block bottom-animation" style="color: #ffffff;">
                <h6>Mitra Layanan Konsultasi Terpercaya Yang Memberi Anda Layanan Berkualitas Tinggi</h6>
                <h1 class="fw-bold" style="font-size: 60px;">Mengungkap Kisah</h1>
                <h1 class="fw-bold" style="font-size: 60px;">Mencerahkan Dunia</h1>
                <h6 class="mb-5">Mari bagikan ceritamu dan konsultasikan di Ayo Cerita!</h6>
                @if (Auth::check())
                    <a href="{{ route('mental_test.index') }}" class="btn px-5 py-3 mb-5 fw-semibold" style="background-color: #fff640; color: #000000;">Ayo Cerita! <img src="assets/icon/arrow-right.png" alt="..." class="img-fluid" style="margin-bottom: 2px;"></a>
                @else
                    <button class="btn px-5 py-3 mb-5 fw-semibold" style="background-color: #fff640; color: #000000;" data-bs-toggle="modal" data-bs-target="#exampleModal">Ayo Cerita! <img src="assets/icon/arrow-right.png" alt="..." class="img-fluid" style="margin-bottom: 2px;"></button>
                    {{-- modal start --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: #ffffff;">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: #000000;">
                            <div class="modal-header border-0">
                                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">AyoCerita!</h1> -->
                                <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                            </div>
                            <div class="modal-body text-start border-0">
                                Silakan login terlebih dahulu
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="{{ route('auth.login') }}" class="btn btn-warning">Login</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- modal end --}}
                @endif
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/home2.jpg') }}" class="d-block w-100" alt="..." style="height: 643px;">
            <div class="carousel-caption d-none d-md-block">
                <div class="col pb-5">
                    <h1 class="fw-bold" style="font-size: 60px;">Berdialog Dengan Badai</h1>
                    <h1 class="fw-bold" style="font-size: 60px;">Kembali Pulih Bersama</h1>
                    <h1 class="fw-bold mb-5 pb-5" style="font-size: 60px;">Ayo Cerita!</h1>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/home3.png') }}" class="d-block w-100" alt="..." style="height: 643px;">
            <div class="carousel-caption d-none d-md-block pb-5">
                <div class="col" style="padding-bottom: 90px;">
                    <h1 class="fw-bold" style="font-size: 60px;">Membasuh Luka Lalu</h1>
                    <h1 class="fw-bold mb-5 pb-5" style="font-size: 60px;">Berdaya</h1>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- carousel end -->

    <!-- dok-dok section start -->
    <section style="background-color: #000000;">
        <div class="container py-5">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center gap-5">
                    <div class="d-flex row justify-content-center align-items-center">
                        <div class="col-md-3 col-sm-6 col-12 text-center reveal-left">
                            <a href="https://www.halodoc.com/" target="_blank">
                                <img src="{{ asset('assets/icon/halodoc.png') }}" alt="..." style="width: 170px;">
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 text-center reveal-left">
                            <a href="https://www.klikdokter.com/" target="_blank">
                                <img src="{{ asset('assets/icon/dokter.png') }}" alt="..." style="width: 170px;">
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 text-center reveal-right">
                            <a href="https://www.alodokter.com/" target="_blank">
                                <img src="{{ asset('assets/icon/alodokter.png') }}" alt="..." style="width: 170px;">
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 text-center reveal-right">
                            <a href="https://www.yesdok.com/" target="_blank">
                                <img src="{{ asset('assets/icon/YesDok.png') }}" alt="..." style="width: 150px; height: 35px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dok-dok section end -->

    <!-- penawaran kami start -->
    <section class="pb-4" style="background-color: #000000;">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="mb-5 mt-5 px-5 py-2 pt-3 d-flex justify-content-center align-items-center" style="background-color: #fff640; border-radius: 60px;">
                        <h3 class="fw-semibold" style="color: #000000; font-family: 'poppins';">Penawaran Kami</h3>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col d-flex gap-4 justify-content-center">
                    <div class="row reveal-left">
                        <div class="card col-md-3 col-sm-6 col-12 border-0" style="background-color: #000000; color: #ffffff;">
                            <div class="card-body">
                                <img src="{{ asset('assets/icon/privasi.png') }}" alt="..." class="card-img-top" style="width: 65px;">
                                <h5 class="card-title mt-3">Privasi Yang Aman</h5>
                                <p class="card-text mt-3">Kamu bercerita, kami akan jaga rahasia. Keamanan data Anda adalah prioritas utama kami.</p>
                            </div>
                        </div>
                        <div class="card col-md-3 col-sm-6 col-12 border-0" style="background-color: #000000; color: #ffffff;">
                            <div class="card-body">
                                <img src="{{ asset('assets/icon/sehat.png') }}" alt="..." class="card-img-top" style="width: 65px;">
                                <h5 class="card-title mt-3">Sehat Mental No.1</h5>
                                <p class="card-text mt-3">Konsultasikan masalah Anda dengan para ahli dari tim profesional kami.</p>
                            </div>
                        </div>
                        <div class="card col-md-3 col-sm-6 col-12 border-0" style="background-color: #000000; color: #ffffff;">
                            <div class="card-body">
                                <img src="{{ asset('assets/icon/jempol.png') }}" alt="..." class="card-img-top" style="width: 65px;">
                                <h5 class="card-title mt-3">Mudah Digunakan</h5>
                                <p class="card-text mt-3">Kami memastikan Anda dapat dengan mudah mengakses konsultasi online dimana saja.</p>
                            </div>
                        </div>
                        <div class="card col-md-3 col-sm-6 col-12 border-0" style="background-color: #000000; color: #ffffff;">
                            <div class="card-body">
                                <img src="{{ asset('assets/icon/jam.png') }}" alt="..." class="card-img-top" style="width: 65px;">
                                <h5 class="card-title mt-3">Jadwal Fleksibel</h5>
                                <p class="card-text mt-3">Tim kami akan selalu sigap dalam menangani permasalahan Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- penawaran kami end -->

    <!-- tentang kami start -->
    <section id="tentangKami" class="py-5" style="background-color: #000000;">
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-6 col-sm-5 align-items-center justify-content-center reveal-left">
                    <img src="{{ asset('assets/img/tentangKami.png') }}" alt="..." class="img-fluid my-5">
                </div>
                <div class="ps-5 col-md-6 col-sm-5 d-flex flex-column reveal-right2">
                    <div class="row pb-0 mb-0">
                        <div class="col">
                            <h5 class="ps-3" style="color: #ffffff;">Tentang Kami</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-0 mt-0 d-flex">
                            <img src="{{ asset('assets/icon/garisKuning.png') }}" alt="..." class="img-fluid pt-2" style="width: 7px; height: 40px;">
                            <p class="fw-semibold fs-3 ps-2 pt-0" style="color: #fff640; font-family: 'poppins';">Kami Menangani Aspek Layanan Kesehatan Profesional</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="line-height: 25px;">
                            <p class="mb-2 pb-1 ps-3 me-0 pe-0" style="color: #ffffff;">Dengan 2 ribu tenaga profesional yang kami miliki serta bekerja sama dengan 14 sekolah, rumah sakit pemerintahan dan rumah sakit swasta yang terpercaya. Kami akan menjamin masalah kesehatan Anda dapat <u class="text-decoration-none" style="color: #fff640; line-height: 0px; margin-top: 0; padding-top: 0;">tertangani dengan cepat dan tepat.</u></p>
                        </div>
                    </div>
                    <div class="row mt-5 ps-3">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h2 style="color: #fff640; font-family: 'poppins';" class="fw-bold">5.196</h2>
                                    <p style="color: #ffffff;">Siswa yang cerita di Ayo Cerita!</p>
                                </div>
                                <div class="col">
                                    <h2 style="color: #fff640; font-family: 'poppins';" class="fw-bold">14</h2>
                                    <p style="color: #ffffff;">Sekolah yang sudah berkolaborasi</p>
                                </div>
                                <div class="col">
                                    <h2 style="color: #fff640; font-family: 'poppins';" class="fw-bold">2.000</h2>
                                    <p style="color: #ffffff;">Tenaga Profesional yang terdiri dari Guru BK/BP, dan Psikolog</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('tentang_kami') }}" class="btn btn-outline-warning px-5 py-3 fw-semibold">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tentang kami end -->

    <!-- layanan kami start -->
    <section id="layanan" class="pb-5" style="background-color: #000000;">
        <div class="container">
            <div class="row reveal-right2">
                <div class="col-md-6 col-sm-5 d-flex justify-content-center flex-column">
                    <div class="row">
                        <div class="col">
                            <h5 class="ps-3" style="color: #ffffff;">Layanan Kami</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-0 mt-0 d-flex">
                            <img src="{{ asset('assets/icon/garisKuning.png') }}" alt="..." class="img-fluid pt-2" style="width: 7px; height: 40px;">
                            <p class="fw-semibold fs-3 ps-2 pt-0" style="color: #fff640; font-family: 'poppins';">Pelayanan Yang Terpercaya, Handal, dan Cepat </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="line-height: 21px;">
                            <p class="mb-2 pb-1 ps-3" style="color: #ffffff;">Ayo Cerita! memahami bahwa kepercayaan adalah pondasi dari setiap hubungan yang sukses. Oleh karena itu, kami selalu mengutamakan integritas dan profesionalisme dalam setiap interaksi dengan pelanggan kami.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4 d-flex align-items-center">
                            <img src="{{ asset('assets/img/4foto.png') }}" alt="..." class="ps-3">
                            <p style="color: #ffffff;" class="ms-5 pt-1">4,9 rb+ pengguna</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/layananKami2.png') }}" alt="..." class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- layanan kami end -->

    <!-- artikel start -->
    <section id="artikel" style="background-color: #000000;" class="pt-3">
        <div class="container mt-4">

            <!-- sex edu start -->
            <section>
                <div class="row">
                    <div class="col">
                        <h3 style="color: #ffffff; font-family: 'poppins';" class="fw-bold">Artikel Sex Education</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs gap-4 mt-3" style="border: none;" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-warning px-4 active fw-semibold" id="pubertas-tab" data-bs-toggle="tab" data-bs-target="#pubertas-tab-pane" type="button" role="tab" aria-controls="pubertas-tab-pane" aria-selected="true">Pubertas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-warning px-4 fw-semibold" id="fisik-tab" data-bs-toggle="tab" data-bs-target="#fisik-tab-pane" type="button" role="tab" aria-controls="fisik-tab-pane" aria-selected="false">Penyakit alat kelamin</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="btn btn-outline-warning px-4 fw-semibold" id="sexEdu-tab" data-bs-toggle="tab" data-bs-target="#sexEdu-tab-pane" type="button" role="tab" aria-controls="sexEdu-tab-pane" aria-selected="false">Sex Education</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <!-- pubertas start -->
                            <div class="tab-pane fade show active" id="pubertas-tab-pane" role="tabpanel" aria-labelledby="pubertas-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/pubertas1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Bun, pubertas itu apa?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Pubertas adalah fase pertumbuhan di mana akhirnya anak mengalami ataupun mencapai kematangan reproduksinya. Pada masa pubertas, sistem tubuh lain juga matang selama periode ini.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.halodoc.com/kesehatan/pubertas" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/pubertas2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Kenapa badan ku berubah?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Pubertas merupakan suatu tahap perkembangan seorang anak menjadi dewasa secara seksual. Pada perempuan, pubertas terjadi pada rentang usia 10-14 tahun. Sementara pada laki-laki, pubertas terjadi pada kisaran usia 12-16 tahun.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/pubertas-mengubah-tubuhku" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/pubertas3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Mengapa aku berbeda?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Pubertas dini adalah perubahan tubuh anak menjadi dewasa di usia yang lebih awal dari seharusnya. Anak perempuan dianggap mengalami pubertas dini ketika pubertas terjadi sebelum usia 8 tahun. Sementara pada anak laki-laki...</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/pubertas-dini" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pubertas end -->

                            <!-- perubahan fisik start -->
                            <div class="tab-pane fade" id="fisik-tab-pane" role="tabpanel" aria-labelledby="fisik-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/penyakit1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Apa itu HIV dan AIDS bun?</h5>
                                            </div>
                                            <div class="col">
                                                <p>HIV (human immunodeficiency virus) adalah virus yang merusak sistem kekebalan tubuh dengan menginfeksi dan menghancurkan sel CD4. Jika makin banyak sel CD4 yang hancur, daya tahan tubuh akan makin melemah sehingga rentan diserang berbagai penyakit.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/hiv-aids" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/penyakit2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Gonore sangat menyakitkan</h5>
                                            </div>
                                            <div class="col">
                                                <p>Kencing nanah atau gonore adalah salah satu penyakit menular seksual. Penyakit ini dapat dialami oleh siapa saja, baik pria maupun wanita, meski umumnya dialami oleh pria. Gonore biasanya terjadi di bagian tubuh yang hangat dan lembap, seperti kelamin, anus</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/gonore" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/penyakit3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Apa si Treponema Pollidum itu?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Sifilis disebabkan oleh infeksi bakteri Treponema pallidum yang menyebar melalui hubungan seksual dengan penderita raja singa. Bakteri penyebab sifilis juga bisa menyebar melalui melalui kontak fisik dengan </p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/sifilis" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- perubahan fisik end -->

                            <!-- sex edu diusia dini start -->
                            <div class="tab-pane fade" id="sexEdu-tab-pane" role="tabpanel" aria-labelledby="sexEdu-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/sexEdu1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Aku masih kecil apa aku perlu tahu?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Memberikan pendidikan seks pada anak sejak dini memang penting. Namun, orang tua perlu menyesuaikan dengan umur anak. Memberikan pendidikan seksual sejak dini pada anak sangatlah penting. Di era digital saat ini, semua informasi mengenai apa pun, termasuk tentang </p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.klikdokter.com/ibu-anak/tips-parenting/ini-cara-memberi-pendidikan-seks-pada-anak-sesuai-usia" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/sexEdu2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Tubuhku Milikku</h5>
                                            </div>
                                            <div class="col">
                                                <p>Mengajarkan si Kecil tentang bagian tubuh termasuk bagian tubuh pribadi dengan cara yang sesuai usia, dapat menambah wawasan serta membantu anak dalam mengembangkan perasaan yang sehat tentang tubuhnya.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.popmama.com/kid/4-5-years-old/jemima/alasan-pentingnya-mengajari-anak-tentang-bagian-tubuh-privat" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/sexEdu3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Apa itu malu?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Rasa malu pada anak-anak tidak datang dengan sendirinya. Ada sebuah proses belajar yang membantu balita mengembangkan kesadaran dan perasaan</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.ayahbunda.co.id/balita-psikologi/saatnya-anak-belajar-malu" target="_blank" style="color: #fff640;">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sex edu diusia dini end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- sex edu end -->

            <!-- mental health start -->
            <section>
                <div class="row mt-5">
                    <div class="col">
                        <h3 style="color: #ffffff; font-family: 'poppins';" class="fw-bold">Artikel Mental Health</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs mt-3" style="border: none;" id="myTab" role="tablist">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col d-flex gap-4">
                                            <li class="nav-item" role="presentation">
                                            <button class="btn btn-outline-warning px-4 active fw-semibold" id="bullying-tab" data-bs-toggle="tab" data-bs-target="#bullying-tab-pane" type="button" role="tab" aria-controls="bullying-tab-pane" aria-selected="true">Bullying</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <button class="btn btn-outline-warning px-4 fw-semibold" id="kesepian-tab" data-bs-toggle="tab" data-bs-target="#kesepian-tab-pane" type="button" role="tab" aria-controls="kesepian-tab-pane" aria-selected="false">Dampak Kesepian</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <button class="btn btn-outline-warning px-4 fw-semibold" id="selfHarming-tab" data-bs-toggle="tab" data-bs-target="#selfHarming-tab-pane" type="button" role="tab" aria-controls="selfHarming-tab-pane" aria-selected="false">Self Harming</button>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <!-- bullying start -->
                            <div class="tab-pane fade show active" id="bullying-tab-pane" role="tabpanel" aria-labelledby="bullying-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/bullying1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Mengapa aku dibully?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Menurut bullying.co.uk, Bullying biasanya didefinisikan sebagai perikalu berulang yang dimaksudkan untuk melukai seseorang baik secara emosional maupun fisik, bully sering ditunjukan pada orang tertentu karena ras, agama, jenis kelamin, orientasi seksual</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://doktersehat.com/informasi/kesehatan-umum/bullying/" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/bullying2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Bunda tau itu menyakitkan</h5>
                                            </div>
                                            <div class="col">
                                                <p>Beberapa orang tua tidak yakin bagaimana cara untuk memulai melindungi anak-anak mereka dari bullying dan kekerasan lainnya. Bahkan, beberapa orang tua mungkin tidak tahu apakah anak-anak mereka adalah korban, saksi, atau bahkan pelaku dari perbuatan berbahaya ini.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.unicef.org/indonesia/id/cara-membicarakan-bullying-dengan-anak-anda" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/bullying3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Aku takut dengan suasana diluar</h5>
                                            </div>
                                            <div class="col">
                                                <p>Penindasan dapat menimpa semua orang-mereka yang menjadi pelaku penindasan, mereka yang melakukan penindasan, dan mereka yang menyaksikan penindasan. Penindasan dikaitkan dengan banyak akibat n</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.stopbullying.gov/bullying/effects" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- bullying end -->

                            <!-- kesepian start -->
                            <div class="tab-pane fade" id="kesepian-tab-pane" role="tabpanel" aria-labelledby="kesepian-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/kesepian1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Kesepian adalah hal buruk!</h5>
                                            </div>
                                            <div class="col">
                                                <p>Merasa kesepian dapat memperburuk kondisi emosi seseorang sehingga memicu stress. Tidak seperti stress pada umumnya, stress yang disebebkan kesepian cenderung bertahan lama dan selalu terjadi berulang saat seseorang sedang mengalami suatu masalah.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://hellosehat.com/mental/gangguan-mood/galau-dan-merasa-kesepian-berdampak-buruk-bagi-kesehatan/" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/kesepian2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Mengapa aku kesepian?</h5>
                                            </div>
                                            <div class="col">
                                                <p>cara mengatasi kesepian penting untuk diketahui agar anda terhindar dari berbagai penyakit fisik hingga mental. Kesepian menggambarkan perasaan negatif yang dapat terjadi ketika kebutuhan anda akan interaksi sosial tidak terpenuhi.lantas, bagaimana cara</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://doktersehat.com/psikologi/kesehatan-mental/cara-mengatasi-kesepian/" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/kesepian3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Kesepian menyebabkan penyakit</h5>
                                            </div>
                                            <div class="col">
                                                <p>Merasa kesepian dan terisolasi ternyata tidak hanya bisa berdampak buruk pada kesehatan mentalmu lho, tapi juga kesehatan fisik. Oleh sebab itu, jika kamu sering mengalaminya, lebih baik segera lakukan</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.alodokter.com/bila-kamu-kesepian-inilah-yang-bisa-terjadi-pada-kesehatanmu" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- kesepian end -->

                            <!-- self harming start -->
                            <div class="tab-pane fade" id="selfHarming-tab-pane" role="tabpanel" aria-labelledby="selfHarming-tab" tabindex="0" style="color: #ffffff;">
                                <div class="row mt-5">
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/selfHarming1.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Jangan lukai dirimu!</h5>
                                            </div>
                                            <div class="col">
                                                <p>Selfharm adalah ketika seseorang melukai atau membahayakan diri sendiri untuk mengatasi atau mengekspresikan tekanan emosional dan kekacauan internal. Secara general, mereka tidak berniat untuk membunuh diri mereka sendiri, tapi jika berkelanjutan hasilnya akan</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.siloamhospitals.com/informasi-siloam/artikel/self-harm" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/selfHarming2.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Apa aku pantas mati?</h5>
                                            </div>
                                            <div class="col">
                                                <p>Kehilangan seseorang karena bunuh diri seringkali mengejutkan, menyakitkan, dan tidak disangka. Proses berduka yang dihadapi ketika seseorang meninggal karena bunuh diri lebih kompleks dibandingkan dengan kematian akibat hal lainnya.</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.intothelightid.org/tentang-bunuh-diri/mengenal-penyintas-kehilangan-bunuh-diri-dan-suicide-postvention/" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="row d-flex flex-column">
                                            <div class="col">
                                                <img src="{{ asset('assets/img/selfHarming3.png') }}" alt="...">
                                            </div>
                                            <div class="col mt-3">
                                                <h5 class="fw-bold">Self harm tidak membuatmu puas</h5>
                                            </div>
                                            <div class="col">
                                                <p>: Self-harm atau self-injury terkadang dilakukan seseorang saat perasaan negatif muncul. Ada berbagai alasan mengapa seseorang melakukan tindakan menyakiti diri sendiri ini, misalnya untuk memblokir memori</p>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.klikdokter.com/psikologi/kesehatan-mental/ayo-cari-bantuan-ini-tanda-tanda-self-harm-yang-harus-diketahui" style="color: #fff640;" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- self harming end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- mental health end -->
        </div>
    </section>
    <!-- artikel end -->

    <!-- kata mereka start -->
    <section style="background-color: #000000;">
        <div class="container py-5">
            <h2 style="color: #ffffff" class="fw-bold text-center my-5">Kata Mereka</h2>
            <div class="row mb-5">
                <div class="col d-flex gap-4">
                    <div class="row">
                        <div class="col-md-4 col-sm-5 mb-3 reveal-left2">
                            <div class="card" style="border-radius: 40px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/icon/user1.png') }}" alt="...">
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Saya suka bagaimana Ayo cerita memberikan suara kepada semua orang. Setiap cerita di sini adalah unik dan berharga. Ini adalah tempat yang mempromosikan keberagaman, empati, dan pemahaman. Terima kasih Ayo cerita, saya tidak sabar untuk terus berbagi dan mendengarkan cerita-cerita hebat!</p>
                                            <img src="{{ asset('assets/icon/stars.png') }}" alt="...">
                                            <p class="mt-1 mb-0 fw-semibold">Anonymous</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 mb-3 reveal-bottom">
                            <div class="card" style="border-radius: 40px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/icon/user1.png') }}" alt="...">
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Ayo cerita adalah sarana yang mengagumkan untuk menghubungkan orang dari berbagai latar belakang. Saya merasa terinspirasi setiap kali membaca cerita-cerita yang diposting di sini. Terima kasih Ayo cerita karena memberikan platform yang luar biasa ini!</p>
                                            <img src="{{ asset('assets/icon/stars.png') }}" alt="...">
                                            <p class="mt-1 mb-0 fw-semibold">Anonymous</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 reveal-right2">
                            <div class="card" style="border-radius: 40px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/icon/user1.png') }}" alt="...">
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Ayo cerita telah menjadi bagian penting dalam hidup saya. Saya telah berbagi dan mendengarkan cerita-cerita yang luar biasa di sini. Ini adalah tempat yang positif dan mendukung yang membuat saya merasa terhubung dengan komunitas yang luar biasa.</p>
                                            <img src="{{ asset('assets/icon/stars.png') }}" alt="...">
                                            <p class="mt-1 mb-0 fw-semibold">Anonymous</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kata mereka end -->

    <!-- footer start -->
    @include('templates.components.footer')
    <!-- footer end -->

@endsection

@push('script')
<script>
    const navbar = document.querySelector('.myNav');
    window.onscroll = () => {
        if (window.scrollY > 10) {
            navbar.classList.add('nav-active');
        } else {
            navbar.classList.remove('nav-active');
        }
    };

    function revealBottom() {
        var reveals = document.querySelectorAll(".reveal-bottom");
        for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            }
        }
    }
    window.addEventListener("scroll", revealBottom);

    function revealLeft() {
        var reveals = document.querySelectorAll(".reveal-left");
        for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            }
        }
    }
    window.addEventListener("scroll", revealLeft);

    function revealRight() {
        var reveals = document.querySelectorAll(".reveal-right");
        for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", revealRight);

    function revealRight2() {
        var reveals = document.querySelectorAll(".reveal-right2");
        for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", revealRight2);

    function revealLeft2() {
        var reveals = document.querySelectorAll(".reveal-left2");
        for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", revealLeft2);
</script>
@endpush
