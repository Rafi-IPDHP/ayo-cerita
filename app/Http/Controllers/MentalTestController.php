<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentalTestController extends Controller
{
    public function index() {
        return view('mental_test.index');
    }

    public function range() {
        return view('mental_test.range');
    }

    public function store(Request $request) {
        $request->validate([
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
            'question8' => 'required',
            'question9' => 'required',
            'question10' => 'required',
            'question11' => 'required',
        ],[
            'question1.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question2.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question3.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question4.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question5.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question6.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question7.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question8.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question9.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question10.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
            'question11.required' => 'Pertanyaan ini harus diisi! Silakan pilih jawaban Anda!',
        ]);

        $result = (int)$request->question2 + (int)$request->question3 + (int)$request->question4 + (int)$request->question5 + (int)$request->question6 + (int)$request->question7 + (int)$request->question8 + (int)$request->question9 + (int)$request->question10 + (int)$request->question11 ;
        echo($result);

        return redirect()->route('mental_test.result', ['result' => $result]);
    }

    public function resultPage($result) {
        return view('mental_test.resultPage', compact('result'));
    }
}
