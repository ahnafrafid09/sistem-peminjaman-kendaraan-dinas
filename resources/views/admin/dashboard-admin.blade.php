    @php
        $cards = [
            ['title' => 'Jumlah Akun', 'value' => $totalUsers, 'icon' => 'fas fa-users', 'color' => 'primary'],
            ['title' => 'Pegawai', 'value' => $totalPegawai, 'icon' => 'fas fa-user', 'color' => 'success'],
            ['title' => 'Kepala Unit', 'value' => $totalKepalaUnit, 'icon' => 'fas fa-user', 'color' => 'danger'],
        ];
    @endphp
    @extends('layouts.app')

    @section('title', 'Dashboard')


    @section('content')
        <div class="my-5 d-flex justify-content-end">
            <a href="{{ route('admin.create-user') }}" class="btn btn-primary btn-lg shadow">Tambah User</a>
        </div>

        <div class="container-xxl">
            {{-- Cards --}}
            <div class="row">
                @foreach ($cards as $card)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div
                            class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-{{ $card['color'] }} rounded shadow p-3 align-items-center bg-white">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 text-{{ $card['color'] }}">{{ $card['title'] }}</h6>
                                <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                            </div>
                            <div class="ms-3 text-secondary">
                                <i class="{{ $card['icon'] }} fa-2x"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 mb-3 nav-toggle d-flex gap-2">
                <button id="btnPegawai" class="btn btn-outline-primary active">Pegawai</button>
                <button id="btnKepala" class="btn btn-outline-primary">Kepala Unit</button>
            </div>

            <div class="table-wrapper">
                <div class="table-heading">
                    <form method="GET" action="{{ route('admin.dashboard.index') }}"
                        class="d-flex align-items-center gap-2">
                        <label for="search" class="mb-0">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="form-control" style="max-width: 250px;">
                    </form>
                </div>
                <hr>
                <div id="tablePegawai" class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listPegawai as $pegawai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pegawai->nik }}</td>
                                        <td>{{ $pegawai->username }}</td>
                                        <td>{{ $pegawai->no_telepon }}</td>
                                        <td>{{ $pegawai->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-user', $pegawai->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen me-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="tableKepala" class="container" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listKepalaUnit as $kepala)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kepala->nik }}</td>
                                        <td>{{ $kepala->username }}</td>
                                        <td>{{ $kepala->no_telepon }}</td>
                                        <td>{{ $kepala->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-user', $kepala->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen me-1"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                const btnPegawai = document.getElementById('btnPegawai');
                const btnKepala = document.getElementById('btnKepala');
                const tablePegawai = document.getElementById('tablePegawai');
                const tableKepala = document.getElementById('tableKepala');

                btnPegawai.addEventListener('click', () => {
                    tablePegawai.style.display = 'block';
                    tableKepala.style.display = 'none';
                    btnPegawai.classList.add('active');
                    btnKepala.classList.remove('active');
                });

                btnKepala.addEventListener('click', () => {
                    tablePegawai.style.display = 'none';
                    tableKepala.style.display = 'block';
                    btnKepala.classList.add('active');
                    btnPegawai.classList.remove('active');
                });
            </script>
        @endpush
    @endsection
