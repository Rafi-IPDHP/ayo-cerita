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
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif --}}
                        <form action="{{ route('resetPassword', ['token' => $token]) }}" method="POST">
                            @csrf
                            <input type="email" value="{{ $email }}" name="email" hidden>
                            <input type="text" value="{{ $token }}" name="token" hidden>
                            <div class="mb-0">
                                <label for="password" class="form-label fw-bold fs-5 ms-1 mt-2">New Password <span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;">
                                    <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon"></span>
                                </div>
                                @error('password')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="confirmPassword" class="form-label fw-bold fs-5 ms-1 mt-2">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control @error('password_confirmation') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;">
                                    <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW2()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon2"></span>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-3 d-flex justify-content-center">
                                <button type="submit" class="btn py-2 px-5 fw-bold" style="color: #ffffff; background-color: #000000; border-radius: 20px;">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- content end --}}
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

{{-- <form action="{{ route('resetPassword', ['token' => $token]) }}" method="post">
    @csrf
    <input type="email" value="{{ $email }}" name="email">
    <input type="text" value="{{ $token }}" name="token">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <button type="submit">submit</button>
</form> --}}
