<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function proses(Request $request) {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]{3,30}$/u',
            'username' => 'required|unique:users,username,1,id|regex:/^[a-zA-Z0-9_]{3,20}$/u',
            'email' => 'required|unique:users,email',
            'umur' => 'required|numeric|between:0,99',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/u|confirmed',
        ],[
            'nama.required' => 'Kolom nama wajib diisi!',
            'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi! Nama minimal mengandung 3 karakter, maksimal 30 karakter!',
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
}
