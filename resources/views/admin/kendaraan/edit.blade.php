@extends('layouts.app')
@section('title', 'Edit Kendaraan')
@section('content')
    <div class="container p-0 mt-5 shadow border rounded border-light border-1">
        <div class="bg-light border border-2 rounded border-gray mb-2 px-2 py-3">
            <span class="text-primary">Memperbarui Mobil</span>
        </div>
        @include('partials.toast-error')
        <form action="{{ route('admin.kendaraan.update', $kendaraan->id) }}" method="POST" class="p-4" id="form">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="merek_mobil_id" class="form-label">Masukan Merk</label>
                    <select name="merek_mobil_id" id="merek_mobil_id" class="form-select" required>
                        <option value="">-- Pilih Merk ---</option>
                        @foreach ($listMerkMobil as $merkMobil)
                            <option
                                value="{{ $merkMobil->id }}"{{ old('merek_mobil_id', $kendaraan->merek_mobil_id) === $merkMobil->id ? 'selected' : '' }}>
                                {{ $merkMobil->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ketersediaan" id="tersedia"
                                value="Tersedia"
                                {{ old('status_ketersediaan', $kendaraan->status_ketersediaan) == 'Tersedia' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tersedia">
                                Tersedia
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ketersediaan" id="dipinjam"
                                value="Dipinjam"
                                {{ old('status_ketersediaan', $kendaraan->status_ketersediaan) == 'Dipinjam' ? 'checked' : '' }}>
                            <label class="form-check-label" for="dipinjam">
                                Dipinjam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ketersediaan" id="dalam_perbaikan"
                                value="Dalam Perbaikan"
                                {{ old('status_ketersediaan', $kendaraan->status_ketersediaan) == 'Dalam Perbaikan' ? 'checked' : '' }}>
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
                            <option
                                value="{{ $lokasi->id }}"{{ old('lokasi_awal', $kendaraan->lokasi_awal) === $lokasi->id ? 'selected' : '' }}>
                                {{ $lokasi->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="kapasitas_penumpang" class="form-label">
                        Kapasitas Penumpang
                    </label>
                    <input type="number" name="kapasitas_penumpang" id="kapasitas_penumpang" class="form-control"
                        value="{{ $kendaraan->kapasitas_penumpang }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="plat_nomor" class="form-label">Plat</label>
                    <input type="text" name="plat_nomor" id="plat_nomor" class="form-control"
                        value="{{ $kendaraan->plat_nomor }}" required>
                </div>
                <div class="col-md-6">
                    <label for="warna" class="form-label">Warna</label>
                    <input type="text" name="warna" id="warna" class="form-control"
                        value="{{ $kendaraan->warna }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                    <input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control"
                        value="{{ $kendaraan->tahun_pembuatan }}" required>
                </div>
                <div class="col-md-6">
                    <label for="tanggal_servis_terakhir" class="form-label">Tanggal Servis Terakhir</label>
                    <input type="date" name="tanggal_servis_terakhir" id="tanggal_servis_terakhir" class="form-control"
                        value="{{ old('tanggal_servis_terakhir', optional($kendaraan->tanggal_servis_terakhir)->format('Y-m-d')) }}"
                        required>

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jurusan_id" class="form-label">Unit/Jurusan yang memiliki kendaraan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                        <option value="">-- Pilih Jurusan ---</option>
                        @foreach ($listJurusan as $jurusan)
                            <option
                                value="{{ $jurusan->id }}"{{ old('jurusan_id', $kendaraan->jurusan_id) === $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-3 mt-4">
                <div>
                    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalHapus">Hapus</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.kendaraan.destroy', $kendaraan->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalDelete">Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
