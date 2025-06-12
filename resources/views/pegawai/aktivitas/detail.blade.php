@extends('layouts.app')
@section('title', 'Approval Pengembalian')

@section('content')
    <div class="container p-0 mt-5 shadow border border-light rounded border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <span class="text-primary">Approval Pengembalian</span>
        </div>
        <div class="p-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label">Nama Peminjam</label>
                    <input type="text" name="user_id" id="user_id" class="form-control"
                        value="{{ $peminjaman->user->username }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control"
                        value="{{ $peminjaman->tujuan ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 2: Tanggal Peminjaman & Mobil --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="text" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
                        value="{{ $peminjaman->tanggal_peminjaman->format('Y-m-d') ?? '' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobil" class="form-label">Mobil</label>
                    <input type="text" name="mobil" id="mobil" class="form-control"
                        value="{{ $peminjaman->mobil->merek->nama ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 3: Tanggal Kembali & Lokasi Parkir --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="text" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                        value="{{ $peminjaman->tanggal_pengembalian->format('Y-m-d') ?? 'Tidak di isi' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lokasi_id" class="form-label">Lokasi Parkir</label>
                    <input type="text" name="lokasi_id" id="lokasi_id" class="form-control"
                        value="{{ $peminjaman->lokasiPeminjaman->lokasi ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 4: Jam Pinjam & Jam Kembali --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jam_peminjaman" class="form-label">Jam Peminjaman</label>
                            <input type="text" name="jam_peminjaman" id="jam_peminjaman" class="form-control"
                                value="{{ $peminjaman->jam_peminjaman ?? '' }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_pengembalian" class="form-label">Jam Pengembalian</label>
                            <input type="text" name="jam_pengembalian" id="jam_pengembalian" class="form-control"
                                value="{{ $peminjaman->jam_pengembalian ?? 'Tidak di isi' }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kepemilikan_sim" class="form-label">Memenuhi Syarat SIM</label>
                    <input type="text" name="kepemilikan_sim" id="kepemilikan_sim" class="form-control"
                        value="{{ isset($peminjaman) ? ($peminjaman->kepemilikan_sim ? 'Iya' : 'Tidak') : '' }}" disabled>
                </div>
            </div>

            {{-- Baris 5: SIM & Kondisi Sebelum --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sebelum" class="form-label">Kondisi Sebelum</label>
                    <input type="text" name="kondisi_sebelum" id="kondisi_sebelum" class="form-control"
                        value="{{ $peminjaman->kondisi_sebelum ?? '' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sesudah" class="form-label">Kondisi Sesudah</label>
                    <input type="text" name="kondisi_sesudah" id="kondisi_sesudah" class="form-control"
                        value="{{ $peminjaman->pengembalian->kondisi_sesudah ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 6: Catatan & Approval --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="catatan_pengembalian" class="form-label">Catatan Kepala Unit</label>
                    <input name="catatan_pengembalian" id="catatan_pengembalian" class="form-control"
                        value="{{ $peminjaman->pengembalian->catatan_pengembalian ?? '' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alasan_peminjaman" class="form-label">Keterangan</label>
                    <textarea name="alasan_peminjaman" id="alasan_peminjaman" class="form-control" rows="3" disabled>{{ $peminjaman->alasan_peminjaman ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">status</label>
                    <input type="text" name="status" id="status" disabled value="{{ $peminjaman->status }}"
                        class="form-control">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end">
                <a href="{{ route('kepala-unit.aktivitas.index') }}" class="btn btn-secondary me-2">Kembali</a>
            </div>
            </form>
        </div>
    @endsection
