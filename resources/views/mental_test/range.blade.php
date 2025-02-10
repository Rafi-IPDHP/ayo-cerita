@extends('templates.main')

@section('title', 'Mental Test |')

@push('css')
<style>
    .range-wrapper {
        position: relative;
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
    }

    .form-range {
        width: 100%;
        margin: 5px 0;
        background: transparent;
        -webkit-appearance: none;
        appearance: none;
    }

    /* slider bg */
    .form-range::-webkit-slider-runnable-track {
        height: 6px;
        background: #000000;
        border-radius: 4px;
    }

    /* slider */
    .form-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 15px;
        height: 15px;
        background: #fff640;
        border-radius: 50%;
        cursor: pointer;
    }

    .range-labels {
        position: relative;
        width: 100%;
        height: 20px;
        font-size: 12px;
    }
</style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="range-wrapper">
            <form action="{{ route('mental_test.store') }}" method="POST">
                @csrf
                <input type="range" id="range" name="range" class="form-range" min="0" max="10" step="1" value="0" oninput="updateValue(this.value)">
                <div class="range-labels d-flex justify-content-between"></div>
                <button class="btn btn-primary mt-5" type="submit">submit</button>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const range = document.getElementById('range');
        const labels = document.querySelector('.range-labels');

        const min = parseFloat(range.min);
        const max = parseFloat(range.max);
        const step = parseFloat(range.step);
        const stepsCount = (max - min) / step; // total number of steps

        // generate labels dynamically and position them correctly
        for(let i = min; i <= max; i += step) {
            const label = document.createElement('div');
            label.textContent = i;
            label.style.position = 'absolute';
            label.style.left = `${((i - min) / (max - min)) * 100}%`;
            label.style.transform = 'translateX(-50%)'; // center label under tick
            labels.appendChild(label);
        }
    });

    // function updateValue(value) {
    //     console.log('current value:', value);
    // }
</script>
@endpush
