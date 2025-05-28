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
                        <a class="nav-link text-white" href="{{ route('kepalaunit.profile') }}">
                            <i class="fas fa-user me-2"></i>Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kepalaunit.mobil.index') }}">
                            <i class="fas fa-car me-2"></i>Kelola Mobil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kepalaunit.peminjaman.index') }}">
                            <i class="fas fa-clipboard-list me-2"></i>Persetujuan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kepalaunit.pengembalian.index') }}">
                            <i class="fas fa-exchange-alt me-2"></i>Persetujuan Pengembalian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kepalaunit.rekapitulasi.index') }}">
                            <i class="fas fa-chart-bar me-2"></i>Rekapitulasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Kepala Unit</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Cetak Laporan</button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Mobil</h5>
                            <p class="card-text display-6">{{ $totalMobil }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Mobil Tersedia</h5>
                            <p class="card-text display-6">{{ $availableMobil }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Peminjaman Menunggu</h5>
                            <p class="card-text display-6">{{ $pendingPeminjaman }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pengembalian Menunggu</h5>
                            <p class="card-text display-6">{{ $pendingPengembalian }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">
                            <h5 class="mb-0">Peminjaman Menunggu Persetujuan</h5>
                        </div>
                        <div class="card-body">
                            @if($pendingPeminjamanList->isEmpty())
                                <div class="alert alert-info">Tidak ada peminjaman yang menunggu persetujuan.</div>
                            @else
                                <div class="list-group">
                                    @foreach($pendingPeminjamanList as $peminjaman)
                                    <a href="{{ route('kepalaunit.peminjaman.show', $peminjaman->id) }}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Peminjaman #{{ $peminjaman->id }}</h6>
                                            <small>{{ $peminjaman->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">Oleh: {{ $peminjaman->user->nama }}</p>
                                        <small>Mobil: {{ $peminjaman->mobil->plat_nomor }}</small>
                                    </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('kepalaunit.peminjaman.index') }}" class="btn btn-sm btn-warning">Lihat Semua</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">Pengembalian Menunggu Persetujuan</h5>
                        </div>
                        <div class="card-body">
                            @if($pendingPengembalianList->isEmpty())
                                <div class="alert alert-info">Tidak ada pengembalian yang menunggu persetujuan.</div>
                            @else
                                <div class="list-group">
                                    @foreach($pendingPengembalianList as $pengembalian)
                                    <a href="{{ route('kepalaunit.pengembalian.show', $pengembalian->id) }}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Pengembalian #{{ $pengembalian->id }}</h6>
                                            <small>{{ $pengembalian->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">Untuk Peminjaman #{{ $pengembalian->peminjaman_id }}</p>
                                        <small>Kondisi: {{ $pengembalian->kondisi_sesudah }}</small>
                                    </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('kepalaunit.pengembalian.index') }}" class="btn btn-sm btn-danger">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobil Status -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Status Mobil</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Plat Nomor</th>
                                    <th>Merek</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mobilStatus as $mobil)
                                <tr>
                                    <td>{{ $mobil->plat_nomor }}</td>
                                    <td>{{ $mobil->merek_mobil->nama }}</td>
                                    <td>{{ $mobil->lokasi->lokasi }}</td>
                                    <td>
                                        <span class="badge bg-{{ $mobil->status_ketersediaan == 'Tersedia' ? 'success' : ($mobil->status_ketersediaan == 'Dipinjam' ? 'warning' : 'danger') }}">
                                            {{ $mobil->status_ketersediaan }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $mobil->status_kondisi == 'Baik' ? 'success' : ($mobil->status_kondisi == 'Perlu Service' ? 'warning' : 'danger') }}">
                                            {{ $mobil->status_kondisi }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('kepalaunit.mobil.show', $mobil->id) }}" class="btn btn-sm btn-info">Detail</a>
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
    .card-header.bg-warning {
        background-color: #ffc107 !important;
    }
    .card-header.bg-danger {
        background-color: #dc3545 !important;
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