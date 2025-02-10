<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\ResetPassword;
use App\Models\User;


class ResetPasswordController extends Controller
{
    public function inputEmail() {
        return view('reset_password.input_email');
    }

    public function sendResetLink(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Silakan isi menggunakan email!',
            'email.exists' => 'Email belum terdaftar!',
        ]);

        $token = Str::random(64);

        // Simpan token ke tabel password_resets
        ResetPassword::updateOrInsert(
            ['email' => $request->email],
            ['token' => $token],
        );

        // Kirim email ke pengguna
        Mail::send('reset_password.template_email', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->withSuccess('Pesan reset password sudah terkirim ke email Anda, silakan cek email Anda!');
        // return response()->json(['message' => 'Email reset password telah dikirim.']);
    }

    public function resetPw($email, $token) {
        return view('reset_password.new_pw', compact('email', 'token'));
    }

    public function resetPassword(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/u|confirmed',
        ],[
            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Silakan isi menggunakan email!',
            'email.exists' => 'Email belum terdaftar!',
            'token.required' => 'Anda tidak memiliki token!',
            'password.required' => 'Kolom password wajib diisi!',
            'password.regex' => 'Password setidaknya mengandung huruf besar, huruf kecil dan angka! Minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sama dengan password!',
        ]);

        // validasi token
        $reset = ResetPassword::where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$reset) {
            return back()->withSuccess('Email atau Token tidak valid');
            // return response()->json(['message' => 'Token tidak valid.'], 400);
        }

        // perbarui password pengguna
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // hapus token setelah digunakan
        ResetPassword::where(['email' => $request->email])->delete();

        return redirect()->route('auth.login')->withSuccess('Password berhasil diperbarui!');
    }
}
