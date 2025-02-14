@extends('templates.main')

@section('title', 'Appointment |')

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
    <div class="container content">
        <div class="card my-4">
            <div class="card-body">
                <form action="{{ route('appointment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="pengguna_id" value="{{ $pengguna->id }}">
                    <input type="hidden" name="psikolog_id" value="{{ $psikolog->id }}">
                    <h3 class="fw-medium text-center my-3">Appointment dengan psikolog {{ $psikolog->nama }}!</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam Konsultasi</label>
                                <select class="form-select" name="jam" aria-label="Default select example">
                                    <option disabled selected>Pilih Jam Konsultasi</option>
                                    <option value="08.00">08.00</option>
                                    <option value="09.00">09.00</option>
                                    <option value="10.00">10.00</option>
                                    <option value="11.00">11.00</option>
                                    <option value="12.00">12.00</option>
                                    <option value="13.00">13.00</option>
                                    <option value="14.00">14.00</option>
                                    <option value="15.00">15.00</option>
                                    <option value="16.00">16.00</option>
                                    <option value="17.00">17.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tanggal_konsul" class="form-label">Tanggal Konsultasi</label>
                                <input type="date" name="tanggal_konsul" class="form-control" min="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary me-1 px-4 py-1">Kembali</a>
                            <button type="submit" class="btn btn-warning px-4 py-1">Buat Jadwal</button>
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
