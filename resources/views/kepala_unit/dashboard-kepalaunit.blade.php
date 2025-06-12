@php
    $cards = [
        ['title' => 'Peminjaman', 'value' => $totalPeminjaman, 'icon' => 'fas fa-users', 'color' => 'success'],
        ['title' => 'Pengembalian', 'value' => $totalPengembalian, 'icon' => 'fas fa-user', 'color' => 'primary'],
    ];
@endphp
@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <div class="container-xxl">
        {{-- Cards --}}
        <div class="row">
            @foreach ($cards as $card)
                <div class="col-md-6 mb-4">
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
            <button id="btnPeminjaman" class="btn btn-outline-primary active">Peminjaman</button>
            <button id="btnPengembalian" class="btn btn-outline-primary">Pengembalian</button>
        </div>

        <div class="table-wrapper">
            <div class="table-heading">
                <form method="GET" action="{{ route('admin.dashboard.index') }}" class="d-flex align-items-center gap-2">
                    <label for="search" class="mb-0">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control"
                        style="max-width: 250px;">
                </form>
            </div>
            <hr>
            <div id="tablePeminjaman" class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPeminjaman as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->mobil->merek->nama }}</td>
                                    <td>{{ $peminjaman->mobil->kapasitas_penumpang }}</td>
                                    <td>{{ $peminjaman->status }}</td>
                                    <td>
                                        <a href="{{ route('kepala-unit.peminjaman.approval', $peminjaman->id) }}"
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
            <div id="tablePengembalian" class="container" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Kendaraan</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPengembalian as $pengembalian)
                                @if (
                                    $pengembalian->peminjaman &&
                                        $pengembalian->peminjaman->user &&
                                        $pengembalian->peminjaman->mobil &&
                                        $pengembalian->peminjaman->mobil->merek)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengembalian->peminjaman->tanggal_peminjaman->format('Y-m-d') }}
                                        </td>
                                        <td>{{ $pengembalian->peminjaman->user->username }}</td>
                                        <td>{{ $pengembalian->peminjaman->mobil->merek->nama }}</td>
                                        <td>
                                            <a href="{{ route('kepala-unit.pengembalian.approval', $pengembalian->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen me-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
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
