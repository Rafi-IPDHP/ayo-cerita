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
            <div class="col d-flex justify-content-center" style="font-family: 'poppins'; color: #ffffff;">
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
                        @if ($psikolog->desc != null)
                            <div class="col-md-4 col-sm-5 my-3">
                                <a href="{{ route('appointment.create', ['pengguna_id' => Auth::user()->pengguna->id, 'psikolog_id' => $psikolog->id]) }}" class="text-decoration-none">
                                    <div class="card rounded-5">
                                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset('./storage/'. $psikolog->id . '/photo' . '/' . $psikolog->photo) }}" alt="..." class="img-fluid my-2 rounded-circle" style="width: 150px; height: 150px;">
                                            <h4 class="card-title fw-bold text-black mb-0 pb-0">{{ $psikolog->nama }}</h4>
                                            <p class="mt-0 pt-0 text-decoration-none text-secondary"><small>Psikolog {{ $psikolog->spesialisasi }}</small></p>
                                        </div>
                                        <div style="background-color: #FFF640;" class="mx-0 px-3 py-3 rounded-5">
                                            <p class="card-text text-black">{{ $psikolog->desc }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection
