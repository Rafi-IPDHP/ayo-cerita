@extends('templates.main')

@section('title', 'Pilih Psikolog |')

@push('css')
<style>
    body {
        background-color: #000000;
        font-family: 'poppins';
    }

    .content {
        min-height: 50vh;
    }
</style>
@endpush

@section('content')

    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container my-5 content">
        <div class="row d-flex flex-column">
            <div class="col d-flex justify-content-center mt-4" style="font-family: 'poppins'; color: #ffffff;">
                <h1 class="fw-bold">Selamat Datang, {{ Auth::user()->username }}!</h1>
            </div>
            <div class="col">
                <p style="color: #ffffff;" class="text-center fw-semibold mb-4">Kami di sini untuk membantu Anda. Berikut adalah beberapa rekomendasi terapis yang mungkin cocok untuk Anda.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col d-flex justify-content-center gap-4">
                <div class="row">
                    @foreach ($psikologs as $psikolog)
                        <div class="col-md-4 col-sm-5 my-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card rounded-5">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('./storage/'. $psikolog->id . '/photo' . '/' . $psikolog->photo) }}" alt="..." class="img-fluid my-2 rounded-circle" style="width: 150px; height: 150px;">
                                        <h4 class="card-title fw-bold text-black mb-0 pb-0">{{ $psikolog->nama }}</h4>
                                        <p class="mt-0 pt-0 text-decoration-none text-secondary"><small>Psikolog {{ $psikolog->spesialisasi }}</small></p>
                                        {{-- <img src="{{ asset('./assets/icon/stars.png') }}" alt="..."> --}}
                                    </div>
                                    <div style="background-color: #FFF640;" class="mx-0 px-3 py-3 rounded-5">
                                        <p class="card-text text-black">Dr. Demian adalah seorang psikiater yang berpengalaman dalam mengatasi kecemasan dan depresi. Beliau siap membantu Anda menemukan jalan keluar dari perasaan yang sulit.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-4 col-sm-5 my-1">
                        <a href="booking.html" class="text-decoration-none">
                            <div class="card" style="border-radius: 30px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <img src="../assets/img/doctor2.png" alt="..." class="img-fluid my-2" style="width: 150px;">
                                    <h4 class="card-title fw-bold text-black mb-2">Dr. Abdullah</h4>
                                    <img src="../assets/icon/stars.png" alt="...">
                                </div>
                                <div style="background-color: #FFF640; border-radius: 30px;" class="mx-0 px-3 py-3">
                                    <p class="card-text text-black">jalan keluar dari perasaan yang sulit.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-5 my-1">
                        <a href="booking.html" class="text-decoration-none">
                            <div class="card" style="border-radius: 30px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <img src="../assets/img/doctor3.png" alt="..." class="img-fluid my-2" style="width: 150px;">
                                    <h4 class="card-title fw-bold text-black mb-2">Dr. Enenk</h4>
                                    <img src="../assets/icon/stars.png" alt="...">
                                </div>
                                <div style="background-color: #FFF640; border-radius: 30px;" class="mx-0 px-3 py-3">
                                    <p class="card-text text-black">Dr. Enenk adalah seorang terapis keluarga dengan fokus pada perbaikan hubungan. Beliau membantu pasangan dan keluarga mengatasi konflik dan mencapai kesejahteraan bersama.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection
