@extends('layouts.app')

@section('title', 'Pengajuan Pengembalian')

@section('content')
    <div class="container p-0 mt-5 shadow border border-light rounded border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <span class="text-primary">Pengajuan Pengembalian</span>
        </div>

        @include('partials.toast-success')
        @include('partials.toast-error')

        <form method="POST" action="{{ route('pegawai.pengembalian.store', $peminjaman->id) }}" class="p-4">
            @csrf

            {{-- Baris 1 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="text" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
                        value="{{ $peminjaman->tanggal_peminjaman->format('Y-m-d') }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control"
                        value="{{ $peminjaman->tujuan }}" disabled>
                </div>
            </div>

            {{-- Baris 2 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="text" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                        value="{{ $peminjaman->tanggal_pengembalian->format('Y-m-d') }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobil_id" class="form-label">Kendaraan</label>
                    <input type="text" name="mobil_id" id="mobil_id" class="form-control"
                        value="{{ $peminjaman->mobil->merek->nama }}" disabled>
                </div>
            </div>

            {{-- Baris 3 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jam_peminjaman" class="form-label">Jam Peminjaman</label>
                            <input type="time" name="jam_peminjaman" id="jam_peminjaman" class="form-control"
                                value="{{ $peminjaman->jam_peminjaman }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_pengembalian" class="form-label">Jam Pengembalian</label>
                            <input type="time" name="jam_pengembalian" id="jam_pengembalian" class="form-control"
                                value="{{ $peminjaman->jam_peminjaman }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lokasi_id" class="form-label">Lokasi Parkir</label>
                    <select name="lokasi_id" id="lokasi_id" class="form-select">
                        <option value="">--- Pilih Lokasi Parkir ---</option>
                        @foreach ($lokasi as $listLokasi)
                            <option value="{{ $listLokasi->id }}">{{ $listLokasi->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Baris 4 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sebelum" class="form-label">Kondisi Sebelum</label>
                    <input type="text" name="kondisi_sebelum" id="kondisi_sebelum" class="form-control"
                        value="{{ $peminjaman->kondisi_sebelum }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kepemilikan_sim" class="form-label">Apakah anda memenuhi syarat SIM Kendaraan?</label>
                    <input type="text" name="kepemilikan_sim" id="kepemilikan_sim" class="form-control"
                        value="{{ $peminjaman->kepemilikan_sim ? 'Iya' : 'Tidak' }}" disabled>
                </div>
            </div>

            {{-- Baris 5 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="alasan_peminjaman" class="form-label">Keterangan</label>
                    <textarea name="alasan_peminjaman" id="alasan_peminjaman" class="form-control" rows="3 " disabled>{{ $peminjaman->alasan_peminjaman ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sesudah" class="form-label">Kondisi Sesudah</label>
                    <select name="kondisi_sesudah" id="kondisi_sesudah" class="form-control" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Perlu Diservice">Perlu Diservice</option>
                    </select>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Buat</button>
            </div>
        </form>
    </div>
@endsection

{{-- @push('scripts')
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
@endpush --}}
