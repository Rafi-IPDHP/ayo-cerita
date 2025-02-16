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
    <div class="container content my-4">
        <div class="card bg-transparent">
            <div class="card-body">
                <h4 class="card-title bg-warning py-3 rounded-top-3 text-center fw-bold mb-0">Jadwal Konsultasi</h4>
                <div class="card-text bg-white mt-0 p-3 rounded-bottom-3">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @foreach ($appointments as $appointment)
                        <div class="row mb-3">
                            <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                <span class="fs-5 fw-semibold">{{ $appointment->jam }}</span>
                                <small>{{ date('d-m-Y', strtotime($appointment->tanggal_konsul)) }}</small>
                            </div>
                            <div class="col-6">
                                <div class="accordion" id="accordionUser">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button type="button" class="accordion-button collapsed text-black" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse1" style="background-color: #d9d9d9">
                                                {{ $appointment->psikolog->nama }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse text-black" data-bs-parent="#accordionUser" style="background-color: #d9d9d9">
                                            <div class="accordion-body border border-top-2 border-start-0 border-end-0 border-bottom-0 border-white">
                                                <span>Diagnosa</span>
                                                @if ($appointment->comment != null)
                                                    <p class="mt-2 border border-2 p-2 border-secondary-subtle bg-white rounded-3">{{ $appointment->comment }}</p>
                                                @else
                                                    <p class="mt-2 border border-2 p-2 border-secondary-subtle bg-white rounded-3">Belum ada diagnosa</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                @if ($appointment->status == 'Selesai')
                                    <span class="bg-success rounded-5 px-4 py-2 text-white d-flex justify-content-center align-items-center align-self-center">{{ $appointment->status }}</span>
                                @elseif ($appointment->status == 'Berlangsung')
                                    <span class="bg-danger rounded-5 px-4 py-2 text-white d-flex justify-content-center align-items-center align-self-center">{{ $appointment->status }}</span>
                                @else
                                    <span class="bg-warning rounded-5 px-4 py-2 text-white d-flex justify-content-center align-items-center align-self-center">{{ $appointment->status }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary px-4 me-2">Kembali</a>
            </div>
        </div>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection
