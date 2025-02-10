@extends('templates.main')

@section('title', 'Register |')

@push('css')
<style>
    body {
        background-color: #fff640;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    #eye-icon {
        cursor: pointer;
    }

    #eye-icon2 {
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<!-- nav start -->
@include('templates.components.navbar')
<!-- nav end -->

<!-- register start -->
<div class="container my-3">
    <div class="row">
        <div class="col my-5 d-flex justify-content-center">
            <div class="card px-3 pt-5" style="width: 500px; border-radius: 40px;">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 fw-bold text-uppercase" style="font-family: 'poppins';">Selamat Datang!</h2>
                    <form action="{{ route('auth.proses') }}" method="POST">
                        @csrf
                        <div class="mb-0">
                            <label for="nama" class="form-label fw-bold fs-5 ms-1 mt-2">Nama <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control @error('nama') border-danger @enderror" style="border-radius: 20px; border-color: #000000" id="nama" aria-label="nama" placeholder="Masukkan Nama Anda" value="{{ old('nama') }}">
                            </div>
                            @error('nama')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="username" class="form-label fw-bold fs-5 ms-1 mt-2">Username <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control @error('username') border-danger @enderror" style="border-radius: 20px; border-color: #000000;" id="username" aria-label="username" placeholder="Masukkan Username Anda" value="{{ old('username') }}">
                            </div>
                            @error('username')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="email" class="form-label fw-bold fs-5 ms-1 mt-2">Email <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control @error('email') border-danger @enderror" style="border-radius: 20px; border-color: #000000;" id="email" aria-label="email" placeholder="email@example.com" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="umur" class="form-label fw-bold fs-5 ms-1 mt-2">Umur <span style="color: red;">*</span></label>
                            <input type="number" name="umur" class="form-control @error('umur') border-danger @enderror" style="border-radius: 20px; border-color: #000000;" placeholder="Masukkan umur Anda" value="{{ old('umur') }}">
                            @error('umur')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label fw-bold fs-5 ms-1 mt-2">Password <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;">
                                <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon"></span>
                            </div>
                            @error('password')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label fw-bold fs-5 ms-1 mt-2">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control @error('password_confirmation') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;">
                                <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW2()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon2"></span>
                            </div>
                            @error('password_confirmation')
                                <div class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2 mt-5 d-flex justify-content-center">
                            <button type="submit" class="btn py-2 px-5 fw-bold" style="color: #ffffff; background-color: #000000; border-radius: 20px;">Daftar</button>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <p class="fw-bold text-black">Sudah punya akun?</p>
                            <a href="{{ route('auth.login') }}" class="fw-bold text-decoration-none ms-1" style="color: #F8EC02;"><u style="color: #F8EC02;">Masuk</u></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register end -->
@endsection

@push('script')
<script>
    password = document.getElementById('password')
    confirmPassword = document.getElementById('confirmPassword')
    eyeIcon = document.getElementById('eye-icon')
    eyeIcon2 = document.getElementById('eye-icon2')

    function showPW() {
        if (password.type === "password") {
            password.type = "text";
            eyeIcon.src = "{{ asset('assets/icon/visible.png') }}"
        } else {
            password.type = "password";
            eyeIcon.src = "{{ asset('assets/icon/close-eye.png') }}"
        }
    }

    function showPW2() {
        if (confirmPassword.type === "password") {
            confirmPassword.type = "text";
            eyeIcon2.src = "{{ asset('assets/icon/visible.png') }}"
        } else {
            confirmPassword.type = "password";
            eyeIcon2.src = "{{ asset('assets/icon/close-eye.png') }}"
        }
    }
</script>
@endpush
