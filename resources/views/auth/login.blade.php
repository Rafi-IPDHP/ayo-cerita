@extends('templates.main')

@section('title', 'Login |')

@push('css')
<style>
    body {
        background-color: #fff640;
        background-image: url('{{ asset("assets/img/bg_login.png") }}');
    }

    #eye-icon:hover {
        cursor: pointer;
    }
</style>
@endpush

@section('content')

    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- login start --}}
    <div class="container my-3">
        <div class="row">
            <div class="col my-4 d-flex justify-content-center">
                <div class="card px-4 pt-5" style="width: 450px; border-radius: 40px;">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 fw-bold text-uppercase" style="font-family: 'poppins';">Selamat Datang!</h2>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('auth.authentication') }}" method="POST" class="form-login needs-validate" novalidate id="form-login">
                            @csrf
                            <div class="mb-1 has-validation">
                                <label for="username" class="form-label fw-bold fs-5 ms-1 mt-2">Username <span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-right: none;"><img src="{{ asset('assets/icon/user.png') }}" alt="..." style="width: 20px;"></span>
                                    <input type="text" name="username" class="form-control border-dark" style="border-left: none; border-bottom-right-radius: 20px; border-top-right-radius: 20px;" id="username" aria-label="Username" aria-describedby="user" placeholder="Username" value="{{ old('username') }}" required>
                                    @error('username')
                                        <div class="text-danger fs-6">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback fw-semibold">Please fill out this field</div>
                                </div>
                            </div>
                            <div class="mb-3 has-validation">
                                <label for="password" class="form-label fw-bold fs-5 ms-1 mt-2">Password <span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-left-radius: 19px; border-bottom-left-radius: 20px; border-right: none;"><img src="{{ asset('assets/icon/gembok.png') }}" alt="..." style="width: 20px;"></span>
                                    <input type="password" name="password" id="password" class="form-control border-dark" style="border-right: none; border-left: none;" id="password" required>
                                    <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon"></span>
                                    <div class="invalid-feedback fw-semibold">Please fill out this field</div>
                                </div>
                            </div>
                            <div class="mb-2 mt-4 d-flex justify-content-center">
                                <a href="{{ route('reset_pw.input_email') }}" class="fw-bold text-decoration-none text-black">Lupa Password?</a>
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <button onclick="login()" type="submit" class="btn py-2 px-5 fw-bold" style="color: #ffffff; background-color: #000000; border-radius: 20px;">Masuk</button>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <p class="fw-bold text-black">Belum punya akun?</p>
                                <a href="{{ route('auth.register') }}" class="fw-bold text-decoration-none ms-1" style="color: #F8EC02;"><u style="color: #F8EC02;">Daftar Sekarang</u></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- login end --}}
@endsection

@push('script')
<script>
    let password = document.getElementById('password')
    let eyeIcon = document.getElementById('eye-icon')
    let username = document.getElementById("username");
    let formLogin = document.getElementById("form-login");

    function showPW() {
        if (password.type === "password") {
            password.type = "text";
            eyeIcon.src = "{{ asset('assets/icon/visible.png') }}"
        } else {
            password.type = "password";
            eyeIcon.src = "{{ asset('assets/icon/close-eye.png') }}"
        }
    }

    login = () => {
        if(username.value == '') {
            event.preventDefault()
            formLogin.classList.add('was-validated')
        } else if(password.value == '') {
            event.preventDefault()
            formLogin.classList.add('was-validated')
        }
    }
</script>
@endpush
