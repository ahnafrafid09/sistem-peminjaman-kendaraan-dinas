<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AMKD</title>

    <!-- CSS Bootstrap dan Font -->
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- CSS Login -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

</head>

<body>

    <div class="card login-card">
        <div class="row no-gutters">
            <div class="col-lg-5 bg-logo">
                <img src="{{ asset('img/7197526.jpg') }}" alt="Logo AMKD">
            </div>
            <div class="col-lg-7">
                <div class="form-login">
                    <h4 class="text-center mb-4">SELAMAT DATANG</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" name="username" class="form-control"
                                placeholder="Masukkan Nama Pengguna" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukkan Kata Sandi" required>
                        </div>
                        <div class="form-group">
                            <label for="captcha">CAPTCHA</label>
                            <div class="captcha-box">
                                <div class="captcha-code">{{ $captcha }}</div> <!-- ini pakai variabel -->
                                <input type="text" name="captcha_input" class="form-control"
                                    placeholder="Masukkan CAPTCHA..." required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient btn-block mt-4">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>

</html>
