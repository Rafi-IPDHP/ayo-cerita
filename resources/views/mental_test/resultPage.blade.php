@extends('templates.main')

@section('title', 'Result |')

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
        <div class="row mt-4 d-flex">
            <div class="col-md-4 mt-3 bg-warning rounded-4 d-flex justify-content-center align-items-center py-5 me-auto">
                <div class=" rounded-circle border d-flex justify-content-center align-items-center w-75 py-5 @if ($result >= 71) border-danger @elseif($result >= 31) border-dark @elseif($result >= 0) border-success @endif" style="border-width: 1rem !important;">
                    <span class="fw-semibold" style="font-size: 100px">{{ $result }}</span>
                </div>
            </div>
            <div class="col-md-7 mt-3 d-flex flex-column justify-content-between">
                <div class="row">
                    <div class="col ms-auto d-flex justify-content-end">
                        <p class="bg-warning rounded-4 py-1 px-3 fw-medium text-end">{{ Auth::user()->username }}, <span id="hari_ini"></span></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col rounded-4 p-3" style="background-color: #9CEF85">
                        @if ($result >= 71 && $result <= 100)
                            <p>Halo {{ Auth::user()->username }}! Terima kasih telah mengikuti tes kesehatan mental kami. Berdasarkan hasil yang Anda peroleh, kami melihat adanya indikasi bahwa Anda mungkin sedang menghadapi tantangan yang cukup berat dalam kesejahteraan mental Anda.</p>
                            <p>Kami sangat menyarankan Anda untuk mempertimbangkan berbicara dengan seorang psikolog profesional yang dapat membantu Anda memahami dan mengatasi apa yang sedang Anda alami. Jangan khawatir, Anda tidak sendirian bantuan selalu tersedia untuk Anda.</p>
                            <p>Untuk langkah selanjutnya, Anda dapat dengan mudah membuat janji temu dengan psikolog yang bekerja sama dengan kami melalui halaman berikutnya.</p>
                        @elseif ($result >= 31 && $result <= 70)
                            <p>Halo {{ Auth::user()->username }}! Terima kasih telah mengikuti tes kesehatan mental kami. Berdasarkan hasil yang Anda peroleh, kami melihat bahwa Anda mungkin sedang menghadapi tantangan dalam kesejahteraan mental Anda.</p>
                            <p>Sebagai langkah awal, kami menyarankan Anda untuk bercerita dengan asisten virtual kami. Chatbot AI kami dirancang untuk memberikan dukungan awal, mendengarkan keluhan Anda, serta menawarkan wawasan dan saran yang bisa membantu Anda agar merasa lebih baik.</p>
                            <p>Silakan lanjutkan ke halaman berikutnya untuk mulai bercerita dengan chatbot AI kami.</p>
                        @elseif ($result >= 0 && $result <= 30)
                            <p>Halo {{ Auth::user()->username }}! Terima kasih telah mengikuti tes kesehatan mental kami. Berdasarkan hasil yang Anda peroleh, kami melihat bahwa Anda mungkin memiliki beban pikiran yang perlu disalurkan.</p>
                            <p>Berbagi cerita bisa menjadi langkah yang baik untuk meringankan perasaan. Kami mengundang Anda ke <span class="fw-semibold">Ayo Cerita!</span>, sebuah ruang aman dan anonim di mana Anda bisa menuliskan apa yang dirasakan tanpa takut dihakimi. Terkadang, menuangkan isi hati bisa membantu Anda merasa lebih lega.</p>
                            <p>Jangan ragu untuk berbagi cerita Anda bersama <span class="fw-semibold">Ayo Cerita!</span>, Anda bisa langsung pergi ke halaman berikutnya dan mulailah menulis cerita tentang masalah yang Anda alami.</p>
                        @else
                            <p>Maaf tidak ada hasil untuk mental test anda!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <h1 class="fw-bold text-center" style="color: #fff640;">Box Pertanyaan</h1>
            </div>
            <div class="col-md-8 pt-4">
                <div class="accordion border-0" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item border-start-0 border-end-0" style="background-color: #0f0f10;">
                      <h2 class="accordion-header" style="background-color: #0f0f10;">
                        <button class="accordion-button d-flex justify-content-center align-items-center" type="button" onclick="plusminus1()" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #0f0f10;">
                          <img src="{{ asset('./assets/icon/minus.png') }}" alt="..." style="width: 20px;" id="accordion-img1" class="mb-0">
                          <p style="color: #ffffff;" class="fw-semibold ms-3 mb-1">ADHD ada obatnya gak sih?</p>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p class="text-white">Hai {{ Auth::user()->username }}, pengidap ADHD biasanya akan diberi obat methylphenidate  tetapi untuk ADHD lebih baik pengobatannya dengan cara terapi sosial.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border-top-0 border-start-0 border-end-0" style="background-color: #0f0f10;">
                      <h2 class="accordion-header" style="background-color: #0f0f10;">
                        <button class="accordion-button collapsed" type="button" onclick="plusminus2()" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo" style="background-color: #0f0f10;">
                          <img src="{{ asset('./assets/icon/plus.png') }}" alt="..." style="width: 20px;" id="accordion-img2" class="mb-0">
                          <p style="color: #ffffff;" class="fw-semibold ms-3 mb-1">Gimana sih cara mengatasi anxiety?</p>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <p class="text-white">Hai {{ Auth::user()->username }}, cara menangani anxiety adalah dengan mencoba mengambil nafas dalam dalam, lalu memfokuskan pikiran pada aktivitas yang akan/sedang dijalani.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border-top-0 border-start-0 border-end-0" style="background-color: #0f0f10;">
                      <h2 class="accordion-header" style="background-color: #0f0f10;">
                        <button class="accordion-button collapsed" type="button" onclick="plusminus3()" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree" style="background-color: #0f0f10;">
                          <img src="{{ asset('./assets/icon/plus.png') }}" alt="..." style="width: 20px;" id="accordion-img3" class="mb-0">
                          <p style="color: #ffffff;" class="fw-semibold ms-3 mb-1">Kenapa ya gak ada yang ngertiin aku?</p>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <p class="text-white">Hai {{ Auth::user()->username }}, kenapa anda merasa seperti itu? memang menurut anda orang harus bersikap seperti apa untuk memahami anda? coba renungkan dan rasakan kembali diri anda.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border-top-0 border-start-0 border-end-0" style="background-color: #0f0f10;">
                      <h2 class="accordion-header" style="background-color: #0f0f10;">
                        <button class="accordion-button collapsed" type="button" onclick="plusminus4()" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour" style="background-color: #0f0f10;">
                          <img src="{{ asset('./assets/icon/plus.png') }}" alt="..." style="width: 20px;" id="accordion-img4" class="mb-0">
                          <p style="color: #ffffff;" class="fw-semibold ms-3 mb-1">Gejala utama bipolar apa sih? </p>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <p class="text-white">Hai {{ Auth::user()->username }}, gejala utama bipolar adalah perubahan suasana hati(mood) yang drastis. Perubahan  mood ini biasanya terjadi dalam hitungan ja,hari atau bulan.</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col text-end">
                @if ($result >= 71 && $result <= 100)
                    <a href="" class="btn btn-outline-warning px-4 py-2">Selanjutnya</a>
                @elseif ($result >= 31 && $result <= 70)
                    <a href="https://rafiw50y.chat.qbusiness.us-west-2.on.aws/" target="blank" class="btn btn-outline-warning px-4 py-2">Selanjutnya</a>
                @elseif ($result >= 0 && $result <= 30)
                    <a href="{{ route('post.create') }}" class="btn btn-outline-warning px-4 py-2">Selanjutnya</a>
                @else
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-warning px-4 py-2">Selanjutnya</a>
                @endif
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
    let accordionImg1 = document.getElementById('accordion-img1')
    let accordionImg2 = document.getElementById('accordion-img2')
    let accordionImg3 = document.getElementById('accordion-img3')
    let accordionImg4 = document.getElementById('accordion-img4')

    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    const today = new Date()
    const date = today.getDate()
    const month = monthNames[today.getMonth()]
    const year = today.getFullYear()

    document.getElementById('hari_ini').innerText = `${date} ${month} ${year}`

    plusminus1 = () => {
        if(accordionImg1.src.endsWith("plus.png")) {
            accordionImg1.src = "{{ asset('./assets/icon/minus.png') }}"
        } else {
            accordionImg1.src = "{{ asset('./assets/icon/plus.png') }}"
        }
    }

    function plusminus2() {
        if(accordionImg2.src.endsWith("plus.png")) {
            accordionImg2.src = "{{ asset('./assets/icon/minus.png') }}"
        } else {
            accordionImg2.src = "{{ asset('./assets/icon/plus.png') }}"
        }
    }

    function plusminus3() {
        if(accordionImg3.src.endsWith("plus.png")) {
            accordionImg3.src = "{{ asset('./assets/icon/minus.png') }}"
        } else {
            accordionImg3.src = "{{ asset('./assets/icon/plus.png') }}"
        }
    }

    function plusminus4() {
        if(accordionImg4.src.endsWith("plus.png")) {
            accordionImg4.src = "{{ asset('./assets/icon/minus.png') }}"
        } else {
            accordionImg4.src = "{{ asset('./assets/icon/plus.png') }}"
        }
    }
</script>
@endpush
