@extends('templates.main')

@section('title', 'Register Psikolog |')

@push('css')
<style>
    body {
        background-color: #000000;
        font-family: 'poppins';
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
    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container my-3">
        <div class="row">
            <div class="col my-4 d-flex justify-content-center">
                <div class="card px-3" style="width: 70%; border-radius: 20px; background-color: #f0eee5;">
                    <div class="card-body">
                        <h2 class="card-title text-center mt-3 mb-4 fw-bold text-black" style="font-family: 'poppins">Ayo jadi bagian dari Ayo Cerita!</h2>
                        <form action="{{ route('psi.authPsikolog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="nama" class="form-label fw-medium fs-6 ms-1 mt-3 text-black">Nama Psikolog (beserta gelar) <span style="color: red;">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') border-danger @enderror" style="border-radius: 20px; border-color: #000000" placeholder="Masukkan nama Anda" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Email <span style="color: red;">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') border-danger @enderror" style="border-radius: 20px; border-color: #000000" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="username" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Username <span style="color: red;">*</span></label>
                                <input type="text" name="username" class="form-control @error('username') border-danger @enderror" style="border-radius: 20px; border-color: #000000" placeholder="Masukkan username Anda" value="{{ old('username') }}">
                                @error('username')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="password" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Password <span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;" placeholder="Masukkan password Anda">
                                            <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon"></span>
                                        </div>
                                        @error('password')
                                            <div class="text-danger fs-6">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="password_confirmation" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Konfirmasi Password <span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="confirmPassword" class="form-control @error('password_confirmation') border-danger @enderror" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px; border-right: none; border-color: #000000;" placeholder="Konfirmasi password Anda">
                                            <span class="input-group-text border-dark" style="background-color: #ffffff; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="basic-addon" onclick="showPW2()"><img src="{{ asset('assets/icon/close-eye.png') }}" alt="..." style="width: 20px;" id="eye-icon2"></span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="text-danger fs-6">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="no_hp" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Nomor Telepon <span style="color: red;">*</span></label>
                                        <input type="number" name="no_hp" class="form-control @error('no_hp') border-danger @enderror" style="border-radius: 20px; border-color: #000000" placeholder="Masukkan nomor telepon Anda" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <div class="text-danger fs-6">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="jenis_kelamin" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Jenis Kelamin <span style="color: red;">*</span></label>
                                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') border-danger @enderror" style="border-radius: 20px; border-color: #000000">
                                            <option disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger fs-6">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="spesialisasi" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Spesialisasi <span style="color: red;">*</span></label>
                                <select name="spesialisasi" class="form-select @error('spesialisasi') border-danger @enderror" style="border-radius: 20px; border-color: #000000">
                                    <option disabled selected>Pilih Spesialisasi Anda</option>
                                    <option value="Anak" {{ old('spesialisasi') == 'Anak' ? 'selected' : '' }}>Psikolog Anak</option>
                                    <option value="Remaja" {{ old('spesialisasi') == 'Remaja' ? 'selected' : '' }}>Psikolog Remaja</option>
                                    <option value="Dewasa" {{ old('spesialisasi') == 'Dewasa' ? 'selected' : '' }}>Psikolog Dewasa</option>
                                </select>
                                @error('spesialisasi')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="str_doc" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Upload Dokumen STR Anda (pdf, max 5mb) <span style="color: red;">*</span></label>
                                <input type="file" accept=".pdf" name="str_doc" class="form-control @error('str_doc') border-danger @enderror" style="border-radius: 20px; border-color: #000000;">
                                @error('str_doc')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="sip_doc" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Upload Dokumen SIP Anda (pdf, max 5mb) <span style="color: red;">*</span></label>
                                <input type="file" accept=".pdf" name="sip_doc" class="form-control @error('sip_doc') border-danger @enderror" style="border-radius: 20px; border-color: #000000;">
                                @error('sip_doc')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="institusi_pendidikan" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Alumni Universitas <span style="color: red;">*</span></label>
                                <input type="text" name="institusi_pendidikan" class="form-control @error('institusi_pendidikan') border-danger @enderror" style="border-radius: 20px; border-color: #000000;" placeholder="Masukkan nama universitas Anda" value="{{ old('institusi_pendidikan') }}">
                                @error('institusi_pendidikan')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="photo" class="form-label fw-medium fs-6 ms-1 mt-2 text-black">Upload Foto Anda (Formal, max 10mb) <span style="color: red;">*</span></label>
                                <input type="file" name="photo" accept=".jpg, .jpeg, .png" class="form-control @error('photo') border-danger @enderror" style="border-radius: 20px; border-color: #000000;">
                                @error('photo')
                                    <div class="text-danger fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-4 text-end">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary me-1">Kembali</a>
                                <button type="submit" class="btn fw-semibold px-4" style="background-color: #fff317; color: #000000;">Kirim</button>
                            </div>
                        </form>
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
