@extends('layouts.app')
@section('title', 'Tambah Kendaraan')
@section('content')
    <div class="container p-0 mt-5 shadow border rounded border-light border-1">
        <div class="bg-light border border-2 rounded border-gray mb-2 px-2 py-3">
            <span class="text-primary">Menambahkan Mobil</span>
        </div>
        @include('partials.toast-error')
        <form action="{{ route('admin.kendaraan.store') }}" method="POST" class="p-4" id="form">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="merek_mobil_id" class="form-label">Masukan Merk</label>
                    <select name="merek_mobil_id" id="merek_mobil_id" class="form-select" required>
                        <option value="">-- Pilih Merk ---</option>
                        @foreach ($listMerkMobil as $merkMobil)
                            <option value="{{ $merkMobil->id }}">{{ $merkMobil->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ketersediaan" id="tersedia"
                                value="Tersedia"
                                {{ old('status_ketersediaan', 'Tersedia') == 'Tersedia' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tersedia">
                                Tersedia
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ketersediaan" id="dalam_perbaikan"
                                value="Dalam Perbaikan"
                                {{ old('status_ketersediaan') == 'Dalam Perbaikan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="dalam_perbaikan">
                                Dalam Perbaikan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="lokasi_awal" class="form-label">Lokasi Awal</label>
                    <select name="lokasi_awal" id="lokasi_awal" class="form-select" required>
                        <option value="">-- Pilih Lokasi Awal ---</option>
                        @foreach ($listLokasi as $lokasi)
                            <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="kapasitas_penumpang" class="form-label">
                        Kapasitas Penumpang
                    </label>
                    <input type="number" name="kapasitas_penumpang" id="kapasitas_penumpang" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="plat_nomor" class="form-label">Plat</label>
                    <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="warna" class="form-label">Warna</label>
                    <input type="text" name="warna" id="warna" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                    <input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="tanggal_servis_terakhir" class="form-label">Tanggal Servis Terakhir</label>
                    <input type="date" name="tanggal_servis_terakhir" id="tanggal_servis_terakhir" class="form-control"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jurusan_id" class="form-label">Unit/Jurusan yang memiliki kendaraan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                        <option value="">-- Pilih Jurusan ---</option>
                        @foreach ($listJurusan as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-3 mt-4">
                <div>
                    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
