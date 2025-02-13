<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Psikolog;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function proses(Request $request) {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]{3,30}$/u',
            'username' => 'required|unique:users,username,1,id|regex:/^[a-zA-Z0-9_,.]{3,20}$/u',
            'email' => 'required|unique:users,email',
            'umur' => 'required|numeric|between:0,99',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/u|confirmed',
        ],[
            'nama.required' => 'Kolom nama wajib diisi!',
            'nama.regex' => 'Nama hanya boleh mengandung huruf, spasi, koma dan titik! Nama minimal mengandung 3 karakter, maksimal 30 karakter!',
            'username.required' => 'Kolom username wajib diisi!',
            'username.unique' => 'Username sudah terdaftar, harap gunakan username lain!',
            'username.regex' => 'Username hanya boleh mengandung huruf besar, huruf kecil, angka dan garis bawah! Minimal 3 karakter, maksimal 20 karakter!',
            'email.required' => 'Kolom email wajib diisi!',
            'email.unique' => 'Email sudah terdaftar, harap gunakan email lain!',
            'umur.required' => 'Kolom umur wajib diisi',
            'umur.numeric' => 'Umur harus menggunakan angka!',
            'umur.between' => 'Umur setidaknya berusia 0-99 tahun!',
            'password.required' => 'Kolom password wajib diisi!',
            'password.regex' => 'Password setidaknya mengandung huruf besar, huruf kecil dan angka! Minimal 8 karakter!',
            'password.confirmed' => 'Password dan konfirmasi password tidak sama!',
        ]);

        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => 'user',
        ]);

        Pengguna::create([
            'nama' => $request['nama'],
            'umur' => $request['umur'],
            'user_id' => $user->id
        ]);

        return redirect()->route('auth.login')->withSuccess('Selamat '. $request->nama .'! Akun Anda berhasil dibuat, silakan login!');
    }

    public function login() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Silakan isi Username Anda!',
            'password.required' => 'Silakan isi Password Anda!',
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role === 'psikolog') {
                return redirect()->route('psi.dashboard', ['psikolog_id' => Auth::user()->psikolog->id]);
            }
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah! Silakan coba lagi!'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

    public function logoutPsiRegis(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('psi.register');
    }

    public function psiProfile($psikolog_id) {
        $psikolog = Psikolog::where('id', $psikolog_id)->get();
        return view('profile.psi_profile', compact('psikolog'));
    }

    public function updatePhoto(Request $request, $psikolog_id) {
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg|max:10240',
        ],[
            'photo.required' => 'Input foto harus diisi!',
            'photo.mimes' => 'Foto hanya boleh berupa jpg, png atau jpeg!',
            'photo.max' => 'Maksimal ukuran foto adalah 10 Mb!',
        ]);

        $psikolog = Psikolog::where('id', $psikolog_id)->first();

        if ($psikolog->photo) {
            $oldPhotoPath = storage_path('app/public/' . $psikolog_id . '/photo/' . $psikolog->photo);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        $photo = $request->file('photo');
        $photoName = $photo->getClientOriginalName();
        $photo->storeAs('public/' . $psikolog_id . '/photo' . '/' . $photoName);

        $psikolog->photo = $photoName;
        $psikolog->save();

        return back()->withSuccess('Foto profil berhasil diperbarui!');
    }

    public function updateProfile(Request $request, $psikolog_id) {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s\.]{3,30}$/u',
            'email' => 'required',
            'username' => 'required|regex:/^[a-zA-Z0-9_]{3,20}$/u',
            'no_hp' => 'required|regex:/^\d{7,15}$/u',
            'spesialisasi' => 'required|in:Anak,Remaja,Dewasa',
            'str_doc' => 'mimes:pdf|max:5120',
            'sip_doc' => 'mimes:pdf|max:5120',
            'institusi_pendidikan' => 'required|regex:/^[a-zA-Z\s]{3,40}$/u',
        ],[
            'nama.required' => 'Kolom nama wajib diisi!',
            'nama.regex' => 'Nama hanya boleh mengandung huruf, spasi dan titik! Nama minimal mengandung 3 karakter, maksimal 30 karakter!',
            'email.required' => 'Kolom email wajib diisi!',
            'username.required' => 'Kolom username wajib diisi!',
            'username.regex' => 'Username hanya boleh mengandung huruf besar, huruf kecil, angka dan garis bawah! Minimal 3 karakter, maksimal 20 karakter!',
            'no_hp.required' => 'Kolom nomor telepon wajib diisi!',
            'no_hp.regex' => 'Nomor telepon hanya boleh berisi angka! Nomor telepon minimal 7 dan maksimal 15 angka!',
            'spesialisasi.required' => 'Kolom spesialisasi wajib dipilih!',
            'spesialisasi.in' => 'Silakan pilih anak, remaja atau dewasa!',
            'str_doc.mimes' => 'Dokumen STR hanya mengizinkan file dengan format .pdf!',
            'str_doc.max' => 'Dokumen STR maksimal berukuran 5mb!',
            'sip_doc.mimes' => 'Dokumen SIP hanya mengizinkan file dengan format .pdf!',
            'sip_doc.max' => 'Dokumen SIP maksimal berukuran 5mb!',
            'institusi_pendidikan.required' => 'Kolom alumni universitas wajib diisi!',
            'institusi_pendidikan.regex' => 'Nama universitas hanya boleh mengandung huruf dan spasi! Nama universitas minimal mengandung 3 karakter, maksimal 40 karakter!',
        ]);

        // dd($request);

        $psikolog = Psikolog::where('id', $psikolog_id)->first();

        $psikolog->nama = $request->nama;
        $psikolog->user->email = $request->email;
        $psikolog->user->username = $request->username;
        $psikolog->no_hp = $request->no_hp;
        $psikolog->spesialisasi = $request->spesialisasi;
        $psikolog->institusi_pendidikan = $request->institusi_pendidikan;

        if($request->str_doc) {
            $psikolog->str_doc = $request->str_doc;
        }

        if($request->sip_doc) {
            $psikolog->sip_doc = $request->sip_doc;
        }

        $psikolog->save();

        return back()->with('successProfile', 'Selamat ' . $psikolog->nama . '! Data diri Anda berhasil di perbarui!');
    }
}
