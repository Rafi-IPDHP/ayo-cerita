<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Psikolog;
use App\Models\User;

class PsikologController extends Controller
{
    public function index($psikolog_id) {
        $appointments = Appointment::where('psikolog_id', $psikolog_id)->get();
        return view('psikolog.index', compact('appointments'));
    }

    public function register() {
        return view('psikolog.psi_register');
    }

    public function authPsikolog(Request $request) {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s\.]{3,30}$/u',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username,1,id|regex:/^[a-zA-Z0-9_]{3,20}$/u',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/u|confirmed',
            'no_hp' => 'required|regex:/^\d{7,15}$/u',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'spesialisasi' => 'required|in:Anak,Remaja,Dewasa',
            'str_doc' => 'required|mimes:pdf|max:5120',
            'sip_doc' => 'required|mimes:pdf|max:5120',
            'institusi_pendidikan' => 'required|regex:/^[a-zA-Z\s]{3,40}$/u',
            'photo' => 'required|mimes:jpg,png,jpeg|max:10240',
        ],[
            'nama.required' => 'Kolom nama wajib diisi!',
            'nama.regex' => 'Nama hanya boleh mengandung huruf, spasi dan titik! Nama minimal mengandung 3 karakter, maksimal 30 karakter!',
            'email.required' => 'Kolom email wajib diisi!',
            'email.unique' => 'Email sudah terdaftar, harap gunakan email lain!',
            'username.required' => 'Kolom username wajib diisi!',
            'username.unique' => 'Username sudah terdaftar, harap gunakan username lain!',
            'username.regex' => 'Username hanya boleh mengandung huruf besar, huruf kecil, angka dan garis bawah! Minimal 3 karakter, maksimal 20 karakter!',
            'password.required' => 'Kolom password wajib diisi!',
            'password.regex' => 'Password setidaknya mengandung huruf besar, huruf kecil dan angka! Minimal 8 karakter!',
            'password.confirmed' => 'Password dan konfirmasi password tidak sama!',
            'no_hp.required' => 'Kolom nomor telepon wajib diisi!',
            'no_hp.regex' => 'Nomor telepon hanya boleh berisi angka! Nomor telepon minimal 7 dan maksimal 15 angka!',
            'jenis_kelamin.required' => 'Kolom jenis kelamin wajib dipilih!',
            'jenis_kelamin.in' => 'Silakan pilih laki-laki atau perempuan!',
            'spesialisasi.required' => 'Kolom spesialisasi wajib dipilih!',
            'spesialisasi.in' => 'Silakan pilih anak, remaja atau dewasa!',
            'str_doc.required' => 'Kolom dokumen STR wajib diisi!',
            'str_doc.mimes' => 'Dokumen STR hanya mengizinkan file dengan format .pdf!',
            'str_doc.max' => 'Dokumen STR maksimal berukuran 5mb!',
            'sip_doc.required' => 'Kolom dokumen SIP wajib diisi!',
            'sip_doc.mimes' => 'Dokumen SIP hanya mengizinkan file dengan format .pdf!',
            'sip_doc.max' => 'Dokumen SIP maksimal berukuran 5mb!',
            'institusi_pendidikan.required' => 'Kolom alumni universitas wajib diisi!',
            'institusi_pendidikan.regex' => 'Nama universitas hanya boleh mengandung huruf dan spasi! Nama universitas minimal mengandung 3 karakter, maksimal 40 karakter!',
            'photo.required' => 'Kolom foto wajib diisi!',
            'photo.mimes' => 'Foto hanya mengizinkan file dengan format .jpg, .png, .jpeg!',
            'photo.max' => 'Foto maksimal berukuran 10mb!',
        ]);

        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => 'psikolog',
        ]);

        $str_doc = $request->file('str_doc');
        $str_doc_name = $str_doc->getClientOriginalName();

        $sip_doc = $request->file('sip_doc');
        $sip_doc_name = $sip_doc->getClientOriginalName();

        $photo = $request->file('photo');
        $photo_name = $photo->getClientOriginalName();

        $psikolog = Psikolog::create([
            'nama' => $request['nama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'no_hp' => $request['no_hp'],
            'spesialisasi' => $request['spesialisasi'],
            'str_doc' => $str_doc_name,
            'sip_doc' => $sip_doc_name,
            'institusi_pendidikan' => $request['institusi_pendidikan'],
            'photo' => $photo_name,
            'user_id' => $user->id,
        ]);

        $psikolog_id = $psikolog->id;

        // $directory = storage_path('app/public/' . $psikolog_id);
        // File::makeDirectory($directory, 0755, true);

        // $str_directory = storage_path('app/public/' . $psikolog_id . '/str_doc');
        // $sip_directory = storage_path('app/public/' . $psikolog_id . '/sip_doc');
        // $photo_directory = storage_path('app/public/' . $psikolog_id . '/photo');

        // File::makeDirectory($str_directory, 0755, true);
        // File::makeDirectory($sip_directory, 0755, true);
        // File::makeDirectory($photo_directory, 0755, true);

        // $str_doc->storeAs('public/' . $psikolog_id . '/str_doc' . '/' . $str_doc_name);
        // $sip_doc->storeAs('public/' . $psikolog_id . '/sip_doc' . '/' . $sip_doc_name);
        // $photo->storeAs('public/' . $psikolog_id . '/photo' . '/' . $photo_name);

        Storage::disk('public')->makeDirectory($psikolog_id);
        Storage::disk('public')->makeDirectory("$psikolog_id/str_doc");
        Storage::disk('public')->makeDirectory("$psikolog_id/sip_doc");
        Storage::disk('public')->makeDirectory("$psikolog_id/photo");

        $str_doc->storeAs('public/' . $psikolog_id . '/str_doc' . '/' . $str_doc_name);
        $sip_doc->storeAs('public/' . $psikolog_id . '/sip_doc' . '/' . $sip_doc_name);
        $photo->storeAs('public/' . $psikolog_id . '/photo' . '/' . $photo_name);

        return redirect()->route('auth.login')->withSuccess('Selamat '. $request->nama .'! Akun Anda berhasil dibuat, silakan login!');
    }

    public function listPsikolog() {
        $psikologs = Psikolog::all();
        return view('psikolog.list_psikolog', compact('psikologs'));
    }
}
