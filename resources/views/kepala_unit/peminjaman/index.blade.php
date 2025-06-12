@php
    $cards = [['title' => 'Peminjaman', 'value' => $totalPeminjaman, 'color' => 'success']];
@endphp
@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h4>Jumlah Peminjaman</h4>
            </div>
            {{-- <div class="col-md-6 text-md-end">
                <a href="{{ route('kepala-unit.peminjaman.approval') }}" class="btn btn-primary btn-lg">Approval</a>
            </div> --}}
        </div>
        @foreach ($cards as $card)
            <div
                class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-{{ $card['color'] }} rounded shadow p-3 align-items-center bg-white mt-3 mb-5">
                <div class="flex-grow-1">
                    <h6 class="mb-1 text-{{ $card['color'] }}">{{ $card['title'] }}</h6>
                    <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                </div>
            </div>
        @endforeach

        <h4>Data Pengajuan Peminjaman</h4>

        <div class="table-wrapper">
            <div class="table-heading justify-content-start">
                <span class="fw-bold text-primary">Data Peminjaman</span>
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
                                    <td><span class="bg-primary text-white p-2 rounded">
                                            <i class="fa-solid fa-circle me-1"
                                                style="color: {{ $peminjaman->status === 'Disetujui' ? '#1CC88A' : ($peminjaman->status === 'Ditolak' ? '#e74a3b' : '#ffffff') }};"></i>
                                            {{ $peminjaman->status }}
                                        </span>
                                    </td>

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
        </div>
    </div>
@endsection
