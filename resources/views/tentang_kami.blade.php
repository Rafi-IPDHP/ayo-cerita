@extends('templates.main')

@section('title', 'Tentang Kami |')

@push('css')
<style>
    body{
        background-color: #0f0f10;
    }
</style>
@endpush

@section('content')

    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    <!-- ayo cerita start -->
    <section>
        <div style="height: 580px; background-image: url('{{ asset('assets/img/about_us3.png') }}'); background-repeat: no-repeat; background-size: contain;">
            <div class="container">
                <div class="row pt-5">
                    <div class="col mt-5">
                        <div class="row d-flex flex-column justify-content-center align-items-center mt-5">
                            <div class="col mt-5 d-flex justify-content-center" style="font-family: 'poppins';">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                        <h1 class="fw-bold ms-5 me-3 text-center" style="font-family: 'poppins'; font-size: 100px; color: #000000;">AYO</h1>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <h1 class="fw-bold text-center" style="font-family: 'poppins'; color: #fff640; font-size: 100px;">CERITA!</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center gap-5 mt-4">
                                <a href="{{ route('tentang_kami') }}#sejarah" class="btn fw-semibold px-5 py-3" style="color: #000000; background-color: #fff640;">Sejarah Kami</a>
                                <a href="{{ route('tentang_kami') }}#tim" class="btn fw-semibold px-5 py-3" style="color: #000000; background-color: #fff640;">Tim Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ayo cerita end -->

    <!-- sejarah start -->
    <section id="sejarah" style="margin-top: 90px;">
        <div class="container-xxl mt-5 me-0">
            <div class="row">
                <div class="col-md-6 mb-3 col-sm-5 mt-5 ps-5">
                    <h3 style="font-family: 'poppins'; color: #fff640;" class="fw-bold">Sejarah Kami</h3>
                    <p style="color: #ffffff;">Selamat datang di Ayo Cerita! platform online yang didirikan dengan tujuan utamanya meningkatkan pemahaman dan kesadaran seputar kesehatan mental dan pendidikan seksual. Kami adalah kelompok individu yang penuh semangat dan berkomitmen untuk menghadirkan sumber daya yang mendalam, informatif, dan berkelanjutan dalam dua aspek penting ini.</p>
                </div>
                <div class="col-md-6 col-sm-5 text-center me-0 pe-0">
                    <img src="{{ asset('assets/img/sejarah2.png') }}" alt="..." style="width: 500px;" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- sejarah end -->

    <!-- tim start -->
    <section id="tim">
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <h2 class="fw-bold text-center mt-4 mb-2" style="font-family: 'poppins'; color: #fff640;">Tim Kami</h2>
                    <p style="color: #ffffff;" class="fw-semibold fs-6 text-center">Berikut adalah tim andalan yang berdiri di balik semangat perubahan.</p>
                    <div class="row mt-5">
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim1.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Rafi Islami Pasha DHP</p>
                            <p class="fs-6" style="color: #ffffff;">Web Developer</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim2.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Gunawan Busyaeri S.pd</p>
                            <p class="fs-6" style="color: #ffffff;">Guru Pembimbing</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim3.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Haikal Aji Prabowo</p>
                            <p class="fs-6" style="color: #ffffff;">Content Creator</p>
                        </div>
                    </div>
                    <div class="row mb-5 mt-3">
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim4.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Fitri Nurhidayat</p>
                            <p class="fs-6" style="color: #ffffff;">UI Designer</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim5.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Fahrul Fauzi</p>
                            <p class="fs-6" style="color: #ffffff;">Video Grapher</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center align-items-center" style="line-height: 13px;">
                            <img src="{{ asset('./assets/img/tim6.png') }}" alt="..." class="img-fluid mb-4" style="width: 200px;">
                            <p class="fw-semibold fs-5" style="color: #ffffff;">Arifah Sri Agustin</p>
                            <p class="fs-6" style="color: #ffffff;">UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tim end -->

    <!-- visimisi start -->
    <section style="background-color: #fff640;" class="pb-3">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6 col-sm-5 mt-5 mb-3" style="color: #000000;">
                    <h1 class="fw-bold" style="font-family: 'poppins';">Visi</h1>
                    <p class="fw-semibold">Menciptakan dunia di mana kesehatan mental yang baik dan pendidikan seksual yang bijak menjadi hak dasar setiap individu. Kami bermimpi tentang masyarakat yang lebih berpengetahuan, penuh empati, dan bebas dari stigma terkait dengan masalah kesehatan mental dan seksual.</p>
                    <h1 class="fw-bold mt-5" style="font-family: 'poppins';">Misi</h1>
                    <p class="fw-semibold">Menciptakan dunia di mana setiap individu, dari berbagai latar belakang dan identitas, memiliki akses yang mudah dan terjangkau terhadap pendidikan seksual yang inklusif, dukungan kesehatan mental yang komprehensif, serta membangun masyarakat yang berpengetahuan, empatik, dan bebas dari stigma terkait dengan masalah kesehatan mental dan seksual.</p>
                </div>
                <div class="col-md-5 col-sm-5 justify-content-center d-flex">
                    <img src="{{ asset('./assets/img/visimisi.png') }}" alt="..." class="img-fluid" style="width: 400px;">
                </div>
            </div>
        </div>
    </section>
    <!-- visimisi end -->

    {{-- footer start --}}
    @include('templates.components.footer_black')
    {{-- footer end --}}

@endsection
