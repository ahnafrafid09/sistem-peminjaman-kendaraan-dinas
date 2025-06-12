@extends('layouts.app')

@section('content')
    <div class="container p-0 mt-5 shadow border border-light rounded border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <span class="text-primary">Detail Pengajuan Peminjaman</span>
        </div>

        <div class="p-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
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
                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                        value="{{ $peminjaman->tanggal_pengembalian->format('Y-m-d') }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobil_id" class="form-label">Kendaraan</label>
                    <input type="text" name="mobil_id" class="form-control" value="{{ $peminjaman->mobil->merek->nama }}"
                        disabled>
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
                                value="{{ $peminjaman->jam_pengembalian }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lokasi_nama" class="form-label">Lokasi Parkir</label>
                    <input type="text" id="lokasi_nama" class="form-control"
                        value="{{ $peminjaman->lokasiPeminjaman->lokasi }}" disabled>

                </div>
            </div>

            {{-- Baris 4 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sebelum" class="form-label">Kondisi Sebelum</label>
                    <input type="text" id="kondisi_sebelum" class="form-control"
                        value="{{ $peminjaman->kondisi_sebelum }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kepemilikan_sim" class="form-label">Apakah sudah memiliki Sim></label>
                    <input type="text" id="kepemilikan_sim" class="form-control"
                        value="{{ $peminjaman->kepemilikan_sim ? 'Iya' : 'Tidak' }}" disabled>
                </div>
            </div>

            {{-- Baris 5 --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="alasan_peminjaman" class="form-label">Keterangan</label>
                    <textarea name="alasan_peminjaman" id="alasan_peminjaman" class="form-control" rows="3" disabled> {{ $peminjaman->alasan_peminjaman ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="catatan_kepala_unit" class="form-label">Catatan Kepala Unit</label>
                    @php
                        $status = $peminjaman->status;
                        $catatan = $peminjaman->catatan_kepala_unit;

                        if (!$catatan) {
                            if ($status === 'Diproses') {
                                $catatan = 'Mohon ditunggu, peminjaman Anda sedang diproses.';
                            } elseif ($status === 'Disetujui') {
                                $catatan = 'Peminjaman Anda sudah disetujui.';
                            } elseif ($status === 'Ditolak') {
                                $catatan = 'Peminjaman Anda ditolak.';
                            } elseif ($status === 'Selesai') {
                                $catatan = 'Peminjaman Anda sudah selesai';
                            }
                        }
                    @endphp
                    <input type="text" name="catatan_kepala_unit" id="catatan_kepala_unit" class="form-control"
                        value="{{ $catatan }}" disabled>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2">
                @if ($peminjaman->status === 'Diproses')
                    <a href="{{ route('pegawai.dashboard.index') }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pegawai.dashboard.index') }}" class="btn btn-secondary">Lanjutkan</a>
                @elseif($peminjaman->status === 'Ditolak')
                    <a href="{{ route('pegawai.dashboard.index') }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pegawai.peminjaman.index') }}" class="btn btn-danger">Ulangi</a>
                @elseif($peminjaman->status === 'Disetujui')
                    <a href="{{ route('pegawai.dashboard.index') }}" class="btn btn-primary">Kembali</a>
                    <a href="{{ route('pegawai.dashboard.index') }}" class="btn btn-success">Lanjutkan</a>
                @endif
            </div>
        </div>
    </div>
@endsection
