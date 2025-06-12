@extends('layouts.app')

@section('title', 'Kelola Kendaraan')

@section('content')
    @include('partials.toast-success')
    <div class="container-xxl my-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div
                    class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-primary rounded shadow p-3 align-items-center bg-white">
                    <div class="flex-grow-1">
                        <h6 class="mb-1 text-primary">Jumlah Merk Mobil</h6>
                        <h4 class="mb-0 fw-bold">{{ $jumlahMerkMobil }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div
                    class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-primary rounded shadow p-3 align-items-center bg-white">
                    <div class="flex-grow-1">
                        <h6 class="mb-1 text-primary">Jumlah Kendaraan</h6>
                        <h4 class="mb-0 fw-bold">{{ $jumlahKendaraan }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.kendaraan.merk-mobil.create') }}" class="btn btn-primary btn-lg shadow">Tambah Merk
                    Mobil</a>
            </div>
            <h4>Data Merk Mobil</h4>
            <div class="table-wrapper">
                <div class="table-heading p-4 mb-3">
                </div>
                <div>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Merk Mobil</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listMerkMobil as $merkMobil)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $merkMobil->nama }}</td>
                                            <td>
                                                <a href="{{ route('admin.kendaraan.merk-mobil.edit', $merkMobil->id) }}"
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
        </div>
        <div class="mt-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary btn-lg shadow">Tambah
                    Kendaraan</a>
            </div>
            <h4>Data Kendaraan</h4>
            <div class="table-wrapper">
                <div class="table-heading p-4 mb-3">
                </div>
                <div>
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
                                        <th>Edit</th>
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
                                            <td>
                                                <a href="{{ route('admin.kendaraan.edit', $kendaraan->id) }}"
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
        </div>
    </div>
@endsection
