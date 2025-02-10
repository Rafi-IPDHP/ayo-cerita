<p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
<p>Klik link berikut untuk mereset password Anda:</p>
<a style="background-color: #fff640; color: #000000; border: solid 1px; text-decoration: none; padding: 15px;" href="{{ route('resetPw', ['email' => $email, 'token' => $token]) }}">Reset Password</a>
<p style="margin-top: 10px; padding-top: 10px;">Abaikan email ini jika Anda tidak ingin merubah password Anda</p>
