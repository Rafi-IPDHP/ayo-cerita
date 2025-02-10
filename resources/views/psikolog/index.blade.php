@extends('templates.main')

@push('css')
<style>
    body {
        background-color: #000000;
        font-family: 'poppins';
    }

    .content {
        min-height: 50vh;
    }

    .accordion-button:focus {
        box-shadow: none !important;
        outline: none !important;
    }
</style>
@endpush

@section('content')
    {{-- nav start --}}
    @include('templates.components.navbar')
    {{-- nav end --}}

    {{-- content start --}}
    <div class="container my-4 content">
        <div class="card bg-transparent">
            <div class="card-body">
                <h4 class="card-title bg-warning py-3 rounded-top-3 text-center fw-bold mb-0" id="hari_ini"></h4>
                <div class="card-text bg-white mt-0 p-3 rounded-bottom-3">
                    @foreach ($appointments as $appointment)
                        <div class="row mb-3">
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <span class="fs-5 fw-semibold">{{ $appointment->jam }}</span>
                            </div>
                            <div class="col-6">
                                <div class="accordion" id="accordionUser">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button type="button" class="accordion-button collapsed text-black" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse1" style="background-color: #d9d9d9">
                                                {{ $appointment->pengguna->nama }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse text-black" data-bs-parent="#accordionUser" style="background-color: #d9d9d9">
                                            <div class="accordion-body border border-top-2 border-start-0 border-end-0 border-bottom-0 border-white">
                                                @if ($appointment->comment != null)
                                                    <span>Diagnosa</span>
                                                    <p class="mt-2 border border-2 p-2 border-white rounded-3">{{ $appointment->comment }}</p>
                                                @else
                                                    <form action="" method="post">
                                                        @csrf
                                                        <label for="comment" class="form-label">Diagnosa</label>
                                                        <textarea name="comment" cols="30" rows="3" class="form-control"></textarea>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-warning mt-2 @if ($appointment->status == 'Dijadwalkan') disabled @endif">Kirim</button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                @if ($appointment->status == 'Selesai')
                                    <span class="bg-success rounded-5 px-4 py-2 text-white d-flex justify-content-center align-items-center align-self-center">Selesai</span>
                                @elseif ($appointment->status == 'Berlangsung')
                                    <div class="dropdown d-flex justify-content-center align-items-center align-self-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false">Berlangsung</button>
                                        <ul class="dropdown-menu">
                                            <li><span class="dropdown-item disabled">Dijadwalkan</span></li>
                                            <li><span class="dropdown-item disabled">Berlangsung</span></li>
                                            @if ($appointment->comment != null)
                                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSelesai">Selesai</button></li>
                                            @else
                                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSelesaiNull">Selesai</button></li>
                                            @endif
                                        </ul>
                                    </div>
                                    {{-- modal selesai start --}}
                                    <div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="modalSelesaiLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-black">
                                                <div class="modal-header border-0">
                                                    <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                                </div>
                                                <div class="modal-body text-start border-0 text-white">
                                                    Apakah Anda yakin ingin mengubah status appointment menjadi Selesai?
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <a href="#" class="btn btn-warning px-3">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal selesai end --}}

                                    {{-- modal selesai null start --}}
                                    <div class="modal fade" id="modalSelesaiNull" tabindex="-1" aria-labelledby="modalSelesaiNullLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-black">
                                                <div class="modal-header border-0">
                                                    <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                                </div>
                                                <div class="modal-body text-start border-0 text-white">
                                                    Silakan isi diagnosa pasien terlebih dahulu!
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal selesai null end --}}
                                @elseif ($appointment->status == 'Dijadwalkan')
                                    <div class="dropdown d-flex justify-content-center align-items-center align-self-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="dropdown" aria-expanded="false">Dijadwalkan</button>
                                        <ul class="dropdown-menu">
                                            <li><span class="dropdown-item disabled">Dijadwalkan</span></li>
                                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalBerlangsung">Berlangsung</button></li>
                                            <li><span class="dropdown-item disabled">Selesai</span></li>
                                        </ul>
                                    </div>
                                    {{-- modal start --}}
                                    <div class="modal fade" id="modalBerlangsung" tabindex="-1" aria-labelledby="modalBerlangsungLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-black">
                                                <div class="modal-header border-0">
                                                    <img src="{{ asset('assets/icon/logo.png') }}" alt="..." style="width: 150px;">
                                                </div>
                                                <div class="modal-body text-start border-0 text-white">
                                                    Apakah Anda yakin ingin mengubah status appointment menjadi Berlangsung?
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <a href="#" class="btn btn-warning px-3">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal end --}}
                                @endif
                            </div>
                        </div>
                    @endforeach
                    @empty($appointment)
                        <h5 class="text-center text-black fw-semibold">Belum ada yang mengajukan appointment</h5>
                    @endempty
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
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const today = new Date()
    const date = today.getDate()
    const month = monthNames[today.getMonth()]
    const year = today.getFullYear()

    document.getElementById('hari_ini').innerText = `${date} ${month} ${year}`
</script>
@endpush
