@php
    $cards = [
        ['title' => 'Peminjaman', 'value' => $totalPeminjaman, 'color' => 'success'],
        ['title' => 'Pengembalian', 'value' => $totalPengembalian, 'color' => 'primary'],
    ];
@endphp
@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')
    <div class="container-xxl">
        <div class="row">
            @foreach ($cards as $card)
                <div class="col-md-6 mb-3">
                    <div
                        class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-{{ $card['color'] }} rounded shadow p-3 align-items-center bg-white mt-3 mb-5">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 text-{{ $card['color'] }}">{{ $card['title'] }}</h6>
                            <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="table-wrapper">
            <div class="table-heading justify-content-start">
                <span class="fw-bold text-primary">Rekapitulasi Pengajuan</span>
            </div>
            <hr>
            <div id="tablePeminjaman" class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Status</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPeminjaman as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->user->username }}</td>
                                    <td>
                                        {{ $peminjaman->tanggal_peminjaman->format('Y-m-d') }}
                                        -
                                        {{ $peminjaman->tanggal_pengembalian->format('Y-m-d') }}
                                    </td>

                                    <td>{{ $peminjaman->status }}
                                    </td>

                                    <td>
                                        <a href="{{ route('kepala-unit.aktivitas.show', $peminjaman->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Detail
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
