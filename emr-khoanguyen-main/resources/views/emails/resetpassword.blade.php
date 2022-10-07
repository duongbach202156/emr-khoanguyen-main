<h1>Quên mật khẩu đăng nhập EMR - Khoa Nguyễn</h1>
<h3>Dear <b>{{ $name }}</b>,</h3>
<h3>Bạn có thể reset mật khẩu với link bên dưới:</h3>
<a href="{{ route('auth.recovery.get', $token) }}">Reset Password</a>
<br>
<br>
<i>Link có thời hạn 5 phút</i>