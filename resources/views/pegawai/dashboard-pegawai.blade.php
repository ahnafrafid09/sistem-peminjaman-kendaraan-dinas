@php
    $cardsPeminjaman = [
        ['title' => 'Diproses', 'value' => $totalPeminjamanDiproses, 'icon' => 'fas fa-rotate', 'color' => 'primary'],
        [
            'title' => 'Disetujui',
            'value' => $totalPeminjamanDisetujui,
            'icon' => 'fas fa-check',
            'color' => 'success',
        ],
        ['title' => 'Ditolak', 'value' => $totalPeminjamanDitolak, 'icon' => 'fas fa-x', 'color' => 'danger'],
    ];
    $cardsPengembalian = [
        [
            'title' => 'Diproses',
            'value' => $totalPengembalianDiproses,
            'icon' => 'fas fa-rotate',
            'color' => 'primary',
        ],
        [
            'title' => 'Disetujui',
            'value' => $totalPengembalianDisetujui,
            'icon' => 'fas fa-check',
            'color' => 'success',
        ],
    ];
@endphp
@extends('layouts.app')
@section('title', 'Dahboard')

@section('content')
    <div class="container-xxl">
        <h4>Peminjaman</h4>

        @include('partials.toast-success')
        @include('partials.toast-error')
        <div class="row mb-5">
            @foreach ($cardsPeminjaman as $card)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div
                        class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-{{ $card['color'] }} rounded shadow p-3 align-items-center bg-white">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-{{ $card['color'] }}">{{ $card['title'] }}</h6>
                            <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                        </div>
                        <div class="ms-3 text-secondary">
                            <i class="{{ $card['icon'] }} text-{{ $card['color'] }} fa-2x"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h4>Pengembalian</h4>
        <div class="row mb-5">
            @foreach ($cardsPengembalian as $card)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div
                        class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-{{ $card['color'] }} rounded shadow p-3 align-items-center bg-white">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-{{ $card['color'] }}">{{ $card['title'] }}</h6>
                            <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                        </div>
                        <div class="ms-3 text-secondary">
                            <i class="{{ $card['icon'] }} text-{{ $card['color'] }} fa-2x"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="table-wrapper">
            <div class="table-heading justify-content-start">
                <span class="text-primary fw-bold">Informasi</span>
            </div>
            <hr>
            <div class="container">
                <p class="fw-bold mb-2">Informasi Penting</p>
                <ul class="list-unstyled">
                    <li>📌 Mulai 1 Mei 2025, peminjaman kendaraan hanya bisa dilakukan maksimal 3 hari berturut-turut. Harap
                        sesuaikan jadwal</li>
                    <li>📌 Semua pengajuan peminjaman wajib melalui proses validasi oleh kepala unit sebelum disetujui oleh
                        sistem.</li>
                    <li>📌 Pengajuan hanya dapat dilakukan maksimal H-1 sebelum waktu peminjaman. Pengajuan mendadak tidak
                        akan diproses.</li>
                    <li>📌 Pastikan kendaraan dikembalikan sesuai lokasi awal dan dalam kondisi yang baik.</li>
                    <li>📌 Kendaraan tidak tersedia untuk peminjaman pada tanggal 17 Mei 2025 karena agenda servis rutin.
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-5 mb-3 nav-toggle d-flex gap-2">
            <button id="btnPeminjaman" class="btn btn-outline-primary active">Peminjaman</button>
            <button id="btnPengembalian" class="btn btn-outline-primary">Pengembalian</button>
        </div>

        <div class="table-wrapper">
            <div class="table-heading justify-content-between">
                <span class="text-primary fw-bold">Pengajuan Peminjaman</span>
                <form method="GET" action="{{ route('pegawai.dashboard.index') }}"
                    class="d-flex align-items-center gap-2">
                    <label for="search" class="mb-0">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="form-control" style="max-width: 250px;">
                </form>
            </div>
            <div id="tablePeminjaman" class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPeminjaman as $peminjaman)
                                <tr>
                                </tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjaman->mobil->merek->nama }}</td>
                                <td>{{ $peminjaman->mobil->kapasitas_penumpang }}</td>
                                <td>{{ $peminjaman->status }}</td>
                                <td>
                                    <a href="{{ route('pegawai.peminjaman.show', $peminjaman->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye m-1"></i>
                                    </a>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="tablePengembalian" class="container" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPeminjaman as $peminjaman)
                                @php
                                    $pengembalian = $peminjaman->pengembalian;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->mobil->merek->nama ?? '-' }}</td>
                                    <td>{{ $peminjaman->mobil->kapasitas_penumpang ?? '-' }}</td>
                                    <td>
                                        @if ($pengembalian)
                                            {{ $pengembalian->status }}
                                        @else
                                            Belum Melakukan Pengajuan Pengembalian
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pengembalian)
                                            <a href="{{ route('pegawai.pengembalian.show', $pengembalian->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye m-1"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('pegawai.pengembalian.index', $peminjaman->id) }}"
                                                class="btn btn-sm btn-success">
                                                Return
                                            </a>
                                        @endif
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
            const btnPeminjaman = document.getElementById('btnPeminjaman');
            const btnPengembalian = document.getElementById('btnPengembalian');
            const tablePeminjaman = document.getElementById('tablePeminjaman');
            const tablePengembalian = document.getElementById('tablePengembalian');

            btnPeminjaman.addEventListener('click', () => {
                tablePeminjaman.style.display = 'block';
                tablePengembalian.style.display = 'none';
                btnPeminjaman.classList.add('active');
                btnPengembalian.classList.remove('active');
            });

            btnPengembalian.addEventListener('click', () => {
                tablePeminjaman.style.display = 'none';
                tablePengembalian.style.display = 'block';
                btnPengembalian.classList.add('active');
                btnPeminjaman.classList.remove('active');
            });
        </script>
    @endpush
@endsection
