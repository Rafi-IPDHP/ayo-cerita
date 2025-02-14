<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentalTestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/tentang-kami', function() {
    return view('tentang_kami');
})->name('tentang_kami');

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'auth')->name('auth.authentication');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/proses', 'proses')->name('auth.proses');
    Route::get('/logout', 'logout')->name('auth.logout');
    Route::get('/logout/psi-regis', 'logoutPsiRegis')->name('auth.logout.regisPsi');

    Route::get('/psi/profile/{psikolog_id}', 'psiProfile')->name('profile.psikolog');
    Route::post('/psi/profile/update-photo/{psikolog_id}', 'updatePhoto')->name('profile.psi.updatePhoto');
    Route::post('/psi/profile/update-profile/{psikolog_id}', 'updateProfile')->name('profile.psi.updateProfile');
});

Route::controller(PsikologController::class)->group(function() {
    Route::get('/psi/register', 'register')->name('psi.register');
    Route::post('psi/register/proses', 'authPsikolog')->name('psi.authPsikolog');
    Route::get('/psi/list-psikolog', 'listPsikolog')->middleware('auth')->name('psi.list');

    Route::get('/psi/{psikolog_id}', 'index')->middleware('auth')->name('psi.dashboard');

    Route::post('/psi/add-comment/{appointment_id}', 'addComment')->name('psi.addComment');
    Route::get('/psi/dijadwalkan-to-berlangsung/{appointment_id}', 'dijadwalkanToBerlangsung')->name('status.dijadwalkanToBerlangsung');
    Route::get('/psi/berlangsung-to-selesai/{appointment_id}', 'berlangsungToSelesai')->name('status.berlangsungToSelesai');
});

Route::controller(MentalTestController::class)->middleware('auth')->group(function() {
    Route::get('/mental-test', 'index')->name('mental_test.index');
    Route::get('/mental-test/range', 'range')->name('mental_test.range');
    Route::post('/mental-test/store', 'store')->name('mental_test.store');
    Route::get('/mental-test/result/{result}', 'resultPage')->name('mental_test.result');
});

Route::controller(ResetPasswordController::class)->group(function() {
    Route::get('/input-email/reset-pw', 'inputEmail')->name('reset_pw.input_email');
    Route::post('/forgot-password', 'sendResetLink')->name('sendResetLink');
    Route::get('/reset-pw/{email}/{token}', 'resetPw')->name('resetPw');
    Route::post('/reset-password', 'resetPassword')->name('resetPassword');
});

Route::controller(PostController::class)->middleware('auth')->group(function() {
    Route::get('/post', 'index')->name('post.index');
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post/store', 'store')->name('post.store');
});

Route::controller(AppointmentController::class)->middleware('auth')->group(function() {
    Route::get('/appointment/create/{pengguna_id}/{psikolog_id}', 'create')->name('appointment.create');
    Route::post('/appointment/store/', 'store')->name('appointment.store');
});
