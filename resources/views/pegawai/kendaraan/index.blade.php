@extends('layouts.app')

@section('title', 'List Kendaraan')

@section('content')
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('pegawai.peminjaman.index') }}" class="btn btn-primary btn-lg shadow">Ajukan Peminjaman</a>
    </div>
    <div class="container-xxl">

        <div class="table-wrapper">
            <div class="table-heading justify-content-between">
                <span class="text-primary fw-bold">Unit Kendaraan</span>
                <form method="GET" action="{{ route('pegawai.kendaraan.index') }}" class="d-flex align-items-center gap-2">
                    <label for="search" class="mb-0">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control"
                        style="max-width: 250px;">
                </form>
            </div>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>Kapasitas</th>
                                <th>No Plat</th>
                                <th>Status</th>
                                <th>Lokasi Kendaraan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listKendaraan as $kendaraan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kendaraan->merek->nama }}</td>
                                    <td>{{ $kendaraan->kapasitas_penumpang }}</td>
                                    <td>{{ $kendaraan->plat_nomor }}</td>
                                    <td>{{ $kendaraan->status_ketersediaan }}</td>
                                    <td>{{ $kendaraan->lokasi->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
