@extends('templates.main')

@push('css')
<style>
    body {
        background-color: #000000;
        font-family: 'poppins';
    }
</style>
@endpush

@section('content')
    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container my-5">
        <h2 class="text-white text-center">Gimana nih {{ Auth::user()->username }}, ada yang mau diceritain?</h2>
        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @error('story')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                    <textarea class="form-control border-bottom-0 rounded-bottom-0" name="story" cols="30" rows="5" placeholder="Ceritain disini..."></textarea>
                    <input type="date" name="tanggal_upload" value="{{ now()->format('Y-m-d') }}" hidden>
                    <div class="rounded-bottom-2 d-flex justify-content-between p-2" style="background-color: #d9d9d9">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/icon/earth.png') }}" alt="..." style="width: 30px; height: 30px;" class="img-fluid">
                            <span class="fw-medium ms-2 me-1">Semua orang dapat melihat (anonymous)</span>
                        </div>
                        <div>
                            <button type="button" class="btn btn-warning me-2 rounded-4 px-4 fw-medium" data-bs-toggle="modal" data-bs-target="#postModal">Posting</button>

                            {{-- modal start --}}
                            <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-black">
                                        <div class="modal-header border-0">
                                            <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                        </div>
                                        <div class="modal-body text-white">
                                            Apakah Anda yakin ingin publikasi cerita Anda?
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning fw-medium">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal end --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection

@push('script')
    let
@endpush
