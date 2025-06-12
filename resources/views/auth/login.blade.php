<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Aplikasi Peminjaman Kendaraan Dinas</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Kolom Logo -->
                            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/7197526.jpg') }}" alt="Logo Aplikasi" class="img-fluid px-3"
                                    style="max-height: 300px;">
                            </div>

                            <!-- Kolom Form Login -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Peminjaman Kendaraan Dinas!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user" id="loginForm">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" placeholder="Masukkan Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password"
                                                required>
                                        </div>

                                        <!-- CAPTCHA -->
                                        <div class="form-group">
                                            <label for="captchaInput" class="small">CAPTCHA</label>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-light px-3 py-2 rounded mr-2"
                                                    style="font-weight: bold; color: red;" id="captchaCode">
                                                    12345
                                                </div>
                                                <input type="text" class="form-control" id="captchaInput"
                                                    placeholder="Masukkan CAPTCHA..." required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('auth.forgot') }}">Ganti sandi?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('auth.register') }}">Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('bootstrap/js/sb-admin-2.min.js') }}"></script>

    <!-- Script CAPTCHA -->
    <script>
        function generateCaptcha() {
            const captcha = Math.floor(10000 + Math.random() * 90000); // 5-digit
            document.getElementById('captchaCode').innerText = captcha;
            return captcha;
        }

        let currentCaptcha = generateCaptcha();

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const userCaptcha = document.getElementById('captchaInput').value.trim();
            if (userCaptcha != currentCaptcha) {
                e.preventDefault();
                alert("CAPTCHA salah. Silakan coba lagi.");
                currentCaptcha = generateCaptcha(); // regenerate
                document.getElementById('captchaInput').value = '';
            }
        });
    </script>

</body>

</html>
