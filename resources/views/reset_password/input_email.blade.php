@extends('templates.main')

@section('title', 'Reset Password |')

@push('css')
<style>
    body {
        background-color: #fff640;
        background-image: url('{{ asset("assets/img/bg_login.png") }}');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endpush

@section('content')
    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container d-flex justify-content-center align-items-center" style="height: 90vh">
        <div class="row">
            <div class="col my-4 d-flex justify-content-center align-items-center">
                <div class="card px-4 pt-4 shadow-lg" style="width: 450px; border-radius: 20px;">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 fw-bold" style="font-family: 'poppins';">Reset Password</h2>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('sendResetLink') }}" method="POST">
                            @csrf
                            <div class="mb-0">
                                <label for="email" class="form-label fw-bold fs-5 ms-1 mt-2">Email <span style="color: red;">*</span></label>
                                <input type="email" name="email" placeholder="example@gmail.com" class="form-control @error('email') border-danger @enderror" style="border-radius: 20px; border-color: #000000">
                                @error('email')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-3 d-flex flex-column justify-content-center align-items-center">
                                <button type="submit" class="btn py-2 px-5 fw-bold w-50" style="color: #ffffff; background-color: #000000; border-radius: 20px;">Kirim</button>
                                <a href="{{ route('auth.login') }}" class="btn btn-outline-secondary py-2 px-5 w-50 mt-2" style="border-radius: 20px;">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- content end --}}
@endsection
