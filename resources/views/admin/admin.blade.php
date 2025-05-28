@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('users.index') }}">
                            <i class="fas fa-users me-2"></i>Kelola Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('jurusan.index') }}">
                            <i class="fas fa-building me-2"></i>Kelola Jurusan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('prodi.index') }}">
                            <i class="fas fa-graduation-cap me-2"></i>Kelola Prodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('mobil.index') }}">
                            <i class="fas fa-car me-2"></i>Kelola Mobil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('peminjaman.index') }}">
                            <i class="fas fa-clipboard-list me-2"></i>Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('pengembalian.index') }}">
                            <i class="fas fa-exchange-alt me-2"></i>Pengembalian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('rekapitulasi.index') }}">
                            <i class="fas fa-chart-bar me-2"></i>Rekapitulasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Admin</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pengguna</h5>
                            <p class="card-text display-6">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Mobil</h5>
                            <p class="card-text display-6">{{ $totalMobil }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Peminjaman Aktif</h5>
                            <p class="card-text display-6">{{ $activePeminjaman }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pengembalian Tertunda</h5>
                            <p class="card-text display-6">{{ $pendingPengembalian }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Peminjaman -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Peminjaman Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Peminjam</th>
                                    <th>Mobil</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPeminjaman as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->id }}</td>
                                    <td>{{ $peminjaman->user->nama }}</td>
                                    <td>{{ $peminjaman->mobil->plat_nomor }}</td>
                                    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                    <td>
                                        <span class="badge bg-{{ $peminjaman->status == 'Disetujui' ? 'success' : ($peminjaman->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                            {{ $peminjaman->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Pengembalian -->
            <div class="card">
                <div class="card-header">
                    <h5>Pengembalian Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Peminjaman ID</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPengembalian as $pengembalian)
                                <tr>
                                    <td>{{ $pengembalian->id }}</td>
                                    <td>{{ $pengembalian->peminjaman_id }}</td>
                                    <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                                    <td>{{ $pengembalian->kondisi_sesudah }}</td>
                                    <td>
                                        <span class="badge bg-{{ $pengembalian->status == 'Disetujui' ? 'success' : ($pengembalian->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                            {{ $pengembalian->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('pengembalian.show', $pengembalian->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar {
        min-height: 100vh;
    }
    .nav-link {
        border-radius: 5px;
        margin-bottom: 5px;
    }
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
    }
</style>
@endpush

@push('scripts')
<script>
    // Dashboard scripts can go here
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any dashboard-specific JS
    });
</script>
@endpush