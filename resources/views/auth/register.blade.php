<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Register - Aplikasi Peminjaman Kendaraan Dinas</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- Kolom kiri: Logo -->
                    <div class="col-lg-5 d-flex align-items-center justify-content-center p-4 bg-logo-area">
                        <img src="{{ asset('img/7197526.jpg') }}" alt="Logo AMKD" class="img-fluid"
                            style="max-width: 250px" />
                    </div>
                    <!-- Kolom kanan: Form Registrasi -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    Silakan Registrasi Disini!
                                </h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('auth.register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        placeholder="username" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" placeholder="Konfirmasi Password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control" name="jurusan_id" required>
                                            <option value="" disabled selected>Pilih Jurusan</option>
                                            @foreach ($jurusan as $j)
                                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="prodi_id" required>
                                            <option value="" disabled selected>Pilih Prodi</option>
                                            @foreach ($prodi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="no_telepon"
                                        placeholder="Nomor Telepon" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nik"
                                        placeholder="NIK" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat"
                                        placeholder="Alamat" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrasi Sekarang!!
                                </button>
                            </form>

                            <hr />
                            <div class="text-center">
                                <a class="small" href="{{ route('auth.forgot') }}">Ganti sandi?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('auth.login') }}">Already have an account? Login!</a>
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
</body>

</html>
