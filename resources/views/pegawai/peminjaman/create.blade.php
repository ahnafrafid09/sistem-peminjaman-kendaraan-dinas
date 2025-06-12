@extends('layouts.app')

@section('title', 'Pengajuan Peminjaman')

@section('content')
    <div class="container p-0 mt-5 shadow border border-light rounded border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <span class="text-primary">Pengajuan Peminjaman</span>
        </div>

        @include('partials.toast-success')
        @include('partials.toast-error')

        <form method="POST" action="{{ route('pegawai.peminjaman.store') }}" class="p-4">
            @csrf

            {{-- Baris 1 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control">
                </div>
            </div>

            {{-- Baris 2 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobil_id" class="form-label">Kendaraan</label>
                    <select name="mobil_id" id="mobil_id" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach ($mobil as $listMobil)
                            <option value="{{ $listMobil->id }}" data-lokasi-id="{{ $listMobil->lokasi->id }}"
                                data-lokasi-nama="{{ $listMobil->lokasi->lokasi }}">
                                {{ $listMobil->merek->nama }} - {{ $listMobil->plat_nomor }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Baris 3 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jam_peminjaman" class="form-label">Jam Peminjaman</label>
                            <input type="time" name="jam_peminjaman" id="jam_peminjaman" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_pengembalian" class="form-label">Jam Pengembalian</label>
                            <input type="time" name="jam_pengembalian" id="jam_pengembalian" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lokasi_nama" class="form-label">Lokasi Parkir</label>
                    <input type="text" id="lokasi_nama" class="form-control" readonly>
                    <input type="hidden" name="lokasi_id" id="lokasi_id">

                </div>
            </div>

            {{-- Baris 4 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sebelum" class="form-label">Kondisi Sebelum</label>
                    <select name="kondisi_sebelum" id="kondisi_sebelum" class="form-control" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Perlu Service">Perlu Service</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kepemilikan_sim" class="form-label">Apakah sudah memiliki Sim></label>
                    <select name="kepemilikan_sim" id="kepemilikan_sim" class="form-control" required>
                        <option value="">-- Apakah Sudah memiliki Sim --</option>
                        <option value="1">Iya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>

            {{-- Baris 5 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="alasan_peminjaman" class="form-label">Keterangan</label>
                    <textarea name="alasan_peminjaman" id="alasan_peminjaman" class="form-control" rows="3">{{ $peminjaman->alasan_peminjaman ?? '' }}</textarea>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Buat</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobilSelect = document.getElementById('mobil_id');
            const lokasiNamaInput = document.getElementById('lokasi_nama');
            const lokasiIdInput = document.getElementById('lokasi_id');

            mobilSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const lokasiId = selectedOption.getAttribute('data-lokasi-id');
                const lokasiNama = selectedOption.getAttribute('data-lokasi-nama');
                console.log(selectedOption.getAttribute('data-lokasi-id'));
                console.log(selectedOption.getAttribute('data-lokasi-nama'));
                console.log("lokasiId:", lokasiId);
                console.log("lokasiNama:", lokasiNama);

                if (lokasiId && lokasiNama) {
                    lokasiNamaInput.value = lokasiNama;
                    lokasiIdInput.value = lokasiId;
                } else {
                    lokasiNamaInput.value = '';
                    lokasiIdInput.value = '';
                }
            });
        });
    </script>
@endpush
