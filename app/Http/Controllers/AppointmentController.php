<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pengguna;
use App\Models\Psikolog;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create($pengguna_id, $psikolog_id) {
        $pengguna = Pengguna::where('id', $pengguna_id)->first();
        $psikolog = Psikolog::where('id', $psikolog_id)->first();

        return view('appointment.create', compact('pengguna', 'psikolog'));
    }

    public function store(Request $request) {
        $request->validate([
            'pengguna_id' => 'required',
            'psikolog_id' => 'required',
            'jam' => 'required',
            'tanggal_konsul' => 'required',
        ]);

        Appointment::create([
            'pengguna_id' => $request['pengguna_id'],
            'psikolog_id' => $request['psikolog_id'],
            'jam' => $request['jam'],
            'status' => 'Dijadwalkan',
            'tanggal_konsul' => $request['tanggal_konsul'],
        ]);

        return redirect()->route('dashboard');
    }
}
