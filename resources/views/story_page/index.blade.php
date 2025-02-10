@extends('templates.main')

@section('title', 'Cerita |')

@push('css')
<style>
    body {
        background-color: #000000;
        font-family: 'poppins';
    }

    .content {
        min-height: 40vh;
    }
</style>
@endpush

@section('content')
    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container my-4 content">
        <h2 class="text-warning text-center fw-semibold">Ayo Cerita!</h2>
        @foreach ($posts as $post)
        <div class="card border-top-0 border-start-0 border-end-0 mt-4">
            <div class="card-body bg-black">
                <h4 class="card-title text-decoration-underline text-white">Anonymous</h4>
                <p class="card-text text-white">{{ $post->story }}</p>
            </div>
        </div>
        @endforeach
        @empty($post)
            <p class="text-center fs-6 mt-4 text-white">Cerita belum tersedia!</p>
        @endempty
        <div class="d-flex justify-content-end mt-4 mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-warning my-3">Kembali ke Beranda</a>
        </div>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection
