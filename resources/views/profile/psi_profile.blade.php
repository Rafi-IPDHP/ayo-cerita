@extends('templates.main')

@section('title', 'Profile |')

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
    <div class="container content">
        <div class="card my-4 rounded-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('./storage/' . $psikolog[0]->id . '/photo' . '/' . $psikolog[0]->photo) }}" alt="..." class="img-fluid my-3 rounded-circle" style="height: 300px; width: 300px;">
                        <form action="{{ route('profile.psi.updatePhoto', ['psikolog_id' => $psikolog[0]->id]) }}" method="post" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                            @csrf
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <input type="file" class="form-control" name="photo">
                            @error('photo')
                                <small class="alert alert-danger mt-1 mb-0">{{ $message }}</small>
                            @enderror
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalUpdatePhoto" class="btn btn-warning mt-2">Update Foto</button>

                            {{-- modal start --}}
                            <div class="modal fade" id="modalUpdatePhoto" tabindex="-1" aria-labelledby="modalUpdatePhotoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-black">
                                        <div class="modal-header border-0">
                                            <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                        </div>
                                        <div class="modal-body text-start border-0 text-white">
                                            Apakah Anda yakin ingin mengubah foto profil Anda?
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-warning px-3">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal end --}}
                        </form>
                    </div>
                    <div class="col-md-8">
                        @if(session('successProfile'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                                {{ session('successProfile') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('profile.psi.updateProfile', ['psikolog_id' => $psikolog[0]->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-medium">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $psikolog[0]->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label fw-medium">Nomor Telepon</label>
                                <input type="number" name="no_hp" class="form-control" value="{{ $psikolog[0]->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label for="spesialisasi" class="form-label fw-medium">Spesialisasi</label>
                                <select name="spesialisasi" class="form-select @error('spesialisasi') border-danger @enderror">
                                    <option disabled>Pilih Spesialisasi Anda</option>
                                    <option value="Anak" {{ $psikolog[0]->spesialisasi == 'Anak' ? 'selected' : '' }}>Psikolog Anak</option>
                                    <option value="Remaja" {{ $psikolog[0]->spesialisasi == 'Remaja' ? 'selected' : '' }}>Psikolog Remaja</option>
                                    <option value="Dewasa" {{ $psikolog[0]->spesialisasi == 'Dewasa' ? 'selected' : '' }}>Psikolog Dewasa</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="str_doc" class="form-label fw-medium">Dokumen STR</label>
                                        <a href="{{ asset('./storage/' . $psikolog[0] ->id . '/str_doc' . '/' . $psikolog[0]->str_doc) }}" target="_blank" class="btn btn-outline-warning form-control">Lihat Dokumen</a>
                                        @error('str_doc')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="str_doc" class="form-label fw-medium">Update Dokumen STR</label>
                                        <input type="file" name="str_doc" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="sip_doc" class="form-label fw-medium">Dokumen SIP</label>
                                        <a href="{{ asset('./storage/' . $psikolog[0] ->id . '/sip_doc' . '/' . $psikolog[0]->sip_doc) }}" target="_blank" class="btn btn-outline-warning form-control">Lihat Dokumen</a>
                                        @error('sip_doc')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="sip_doc" class="form-label fw-medium">Update Dokumen SIP</label>
                                        <input type="file" name="sip_doc" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="institusi_pendidikan" class="form-label fw-medium">Alumni Universitas</label>
                                <input type="text" name="institusi_pendidikan" class="form-control" value="{{ $psikolog[0]->institusi_pendidikan }}">
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label fw-medium">Deskripsi Diri Anda (Max: 200 karakter)</label>
                                <textarea name="desc" cols="30" rows="4" class="form-control">{{ $psikolog[0]->desc }}</textarea>
                            </div>
                            <div class="mt-3 d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateProfil">Update Data Diri</button>

                                {{-- modal start --}}
                                <div class="modal fade" id="modalUpdateProfil" tabindex="-1" aria-labelledby="modalUpdateProfilLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-black">
                                            <div class="modal-header border-0">
                                                <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                            </div>
                                            <div class="modal-body text-start border-0 text-white">
                                                Apakah Anda yakin ingin mengupdate data diri Anda?
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-warning px-3">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal end --}}
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
