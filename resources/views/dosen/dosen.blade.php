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
                        <a class="nav-link text-white" href="{{ route('dosen.profile') }}">
                            <i class="fas fa-user me-2"></i>Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dosen.mobil.index') }}">
                            <i class="fas fa-car me-2"></i>Daftar Mobil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dosen.peminjaman.create') }}">
                            <i class="fas fa-plus-circle me-2"></i>Ajukan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dosen.peminjaman.index') }}">
                            <i class="fas fa-clipboard-list me-2"></i>Riwayat Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dosen.pengembalian.index') }}">
                            <i class="fas fa-exchange-alt me-2"></i>Riwayat Pengembalian
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Dosen</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-primary">Cetak Laporan</button>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="alert alert-info mb-4">
                <h5><i class="fas fa-bullhorn me-2"></i>Informasi Penting</h5>
                <ul>
                    <li>Peminjaman kendaraan hanya bisa diajukan maksimal 3 hari kerja sebelum tanggal peminjaman.</li>
                    <li>Semua peminjaman wajib melalui sistem. Peminjaman manual tidak akan diproses.</li>
                    <li>Penggunaan kendaraan harus sesuai dengan kapasitas dan kondisi mobil yang baik.</li>
                    <li>Kendaraan tidak tersedia untuk peminjaman pada tanggal 12 Mei 2025 karena agenda servis rutin.</li>
                </ul>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Peminjaman</h5>
                            <p class="card-text display-6">{{ $totalPeminjaman }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Disetujui</h5>
                            <p class="card-text display-6">{{ $approvedPeminjaman }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Dalam Proses</h5>
                            <p class="card-text display-6">{{ $pendingPeminjaman }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Peminjaman -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Peminjaman Aktif</h5>
                </div>
                <div class="card-body">
                    @if($activePeminjaman->isEmpty())
                        <div class="alert alert-info">Tidak ada peminjaman aktif saat ini.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Mobil</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activePeminjaman as $peminjaman)
                                    <tr>
                                        <td>{{ $peminjaman->id }}</td>
                                        <td>{{ $peminjaman->mobil->plat_nomor }} ({{ $peminjaman->mobil->merek_mobil->nama }})</td>
                                        <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                        <td>{{ $peminjaman->tanggal_pengembalian ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $peminjaman->status == 'Disetujui' ? 'success' : ($peminjaman->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                                {{ $peminjaman->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('dosen.peminjaman.show', $peminjaman->id) }}" class="btn btn-sm btn-info me-1">Detail</a>
                                            @if($peminjaman->status == 'Disetujui' && is_null($peminjaman->tanggal_pengembalian))
                                                <a href="{{ route('dosen.pengembalian.create', $peminjaman->id) }}" class="btn btn-sm btn-success">Ajukan Pengembalian</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Notifications -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Notifikasi Terbaru</h5>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @forelse($notifications as $notification)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $notification->title }}</h6>
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ Str::limit($notification->message, 100) }}</p>
                        </a>
                        @empty
                        <div class="alert alert-info">Tidak ada notifikasi baru.</div>
                        @endforelse
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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any dashboard-specific JS
    });
</script>
@endpush