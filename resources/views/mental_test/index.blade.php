@extends('templates.main')

@section('title', 'Mental Test |')

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
    <div class="container my-3">
        <h1 class="text-center fw-semibold mt-4 mb-5" style="color: #FFF640">Form Pertanyaan</h1>
        <form action="{{ route('mental_test.store') }}" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3 class="card-title text-center fw-semibold text-black">Halo, {{ Auth::user()->username }}</h3>
                            <p class="card-text text-center fs-5">Gimana perasaan kamu akhir-akhir ini?</p>
                            <div class="row w-75 bg-black rounded-5">
                                <div class="col d-flex justify-content-center align-items-center gap-4 py-4">
                                    <input type="radio" class="btn-check" name="question1" id="opt1_1" autocomplete="off" value="senang">
                                    <label for="opt1_1" class="btn btn-outline-light d-flex flex-column px-3">
                                        <img src="{{ asset('assets/icon/bahagia_icon.png') }}" alt="bahagia" style="width: 80px">
                                        Senang
                                    </label>
                                    <input type="radio" class="btn-check" name="question1" id="opt2_1" autocomplete="off" value="datar">
                                    <label for="opt2_1" class="btn btn-outline-light d-flex flex-column px-3">
                                        <img src="{{ asset('assets/icon/datar_icon.png') }}" alt="datar" style="width: 80px">
                                        Datar
                                    </label>
                                    <input type="radio" class="btn-check" name="question1" id="opt3_1" autocomplete="off" value="sedih">
                                    <label for="opt3_1" class="btn btn-outline-light d-flex flex-column px-3">
                                        <img src="{{ asset('assets/icon/sedih_icon.png') }}" alt="sedih" style="width: 80px">
                                        Sedih
                                    </label>
                                    <input type="radio" class="btn-check" name="question1" id="opt4_1" autocomplete="off" value="marah">
                                    <label for="opt4_1" class="btn btn-outline-light d-flex flex-column px-3">
                                        <img src="{{ asset('assets/icon/marah_icon.png') }}" alt="marah" style="width: 80px">
                                        Marah
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question2') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda merasa cemas, gelisah, atau marah tanpa alasan yang jelas dalam dua minggu terakhir?</p>
                            @error('question2')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question2" class="btn-check" id="opt1_2" autocomplete="off" value="10">
                                    <label for="opt1_2" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question2" class="btn-check" id="opt2_2" autocomplete="off" value="0">
                                    <label for="opt2_2" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question3') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda merasa sedih secara berkepanjangan?</p>
                            @error('question3')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question3" class="btn-check" id="opt1_3" autocomplete="off" value="10">
                                    <label for="opt1_3" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question3" class="btn-check" id="opt2_3" autocomplete="off" value="0">
                                    <label for="opt2_3" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question4') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda sering merasa putus asa atau tidak berdaya?</p>
                            @error('question4')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question4" class="btn-check" id="opt1_4" autocomplete="off" value="15">
                                    <label for="opt1_4" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question4" class="btn-check" id="opt2_4" autocomplete="off" value="0">
                                    <label for="opt2_4" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question5') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda merasa kehilangan motivasi untuk melakukan aktivitas sehari-hari?</p>
                            @error('question5')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question5" class="btn-check" id="opt1_5" autocomplete="off" value="10">
                                    <label for="opt1_5" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question5" class="btn-check" id="opt2_5" autocomplete="off" value="0">
                                    <label for="opt2_5" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question6') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda kehilangan minat pada hobi atau aktivitas yang sebelumnya Anda sukai?</p>
                            @error('question6')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question6" class="btn-check" id="opt1_6" autocomplete="off" value="10">
                                    <label for="opt1_6" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question6" class="btn-check" id="opt2_6" autocomplete="off" value="0">
                                    <label for="opt2_6" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question7') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Dalam dua minggu terakhir, apakah Anda mengalami gangguan tidur, seperti kesulitan tidur atau tidur berlebihan?</p>
                            @error('question7')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question7" class="btn-check" id="opt1_7" autocomplete="off" value="10">
                                    <label for="opt1_7" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question7" class="btn-check" id="opt2_7" autocomplete="off" value="0">
                                    <label for="opt2_7" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question8') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda mengalami gangguan makan selama dua minggu terakhir?</p>
                            @error('question8')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question8" class="btn-check" id="opt1_8" autocomplete="off" value="5">
                                    <label for="opt1_8" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question8" class="btn-check" id="opt2_8" autocomplete="off" value="0">
                                    <label for="opt2_8" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question9') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda merasa lelah terus-menerus meskipun tidak melakukan aktivitas berat?</p>
                            @error('question9')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question9" class="btn-check" id="opt1_9" autocomplete="off" value="5">
                                    <label for="opt1_9" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question9" class="btn-check" id="opt2_9" autocomplete="off" value="0">
                                    <label for="opt2_9" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question10') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5 mb-0">Apakah Anda kesulitan berkonsentrasi atau membuat keputusan dalam kegiatan sehari-hari?</p>
                            @error('question10')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 my-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question10" class="btn-check" id="opt1_10" autocomplete="off" value="5">
                                    <label for="opt1_10" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question10" class="btn-check" id="opt2_10" autocomplete="off" value="0">
                                    <label for="opt2_10" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="card rounded-5 @error('question11') border-4 border-danger @enderror">
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text mt-2 text-center fs-5">Apakah Anda pernah berpikir untuk menyakiti diri sendiri atau merasa hidup tidak berarti?</p>
                            @error('question11')
                                <div class="alert alert-danger py-2 px-5 text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row w-75 mb-3">
                                <div class="col d-flex justify-content-center align-items-center gap-4">
                                    <input type="radio" name="question11" class="btn-check" id="opt1_11" autocomplete="off" value="20">
                                    <label for="opt1_11" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">IYA</label>
                                    <input type="radio" name="question11" class="btn-check" id="opt2_11" autocomplete="off" value="0">
                                    <label for="opt2_11" class="btn btn-outline-dark py-2 px-5 rounded-5 fw-semibold border-1">TIDAK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mb-5">
                <a href="{{ url()->previous() }}" class="btn py-2 px-4 rounded-5 text-black" style="background-color: #FFFDEF">Kembali</a>
                <button type="submit" class="btn btn-outline-warning py-2 px-4 rounded-5">Kirim</button>
            </div>
        </form>
    </div>
    {{-- content end --}}

    {{-- footer start --}}
    @include('templates.components.footer')
    {{-- footer end --}}
@endsection
