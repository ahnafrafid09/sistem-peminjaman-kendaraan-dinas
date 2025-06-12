@extends('layouts.app')
@section('title', 'Approval Pengembalian')

@section('content')
    <div class="container p-0 mt-5 shadow border border-light rounded border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <span class="text-primary">Approval Pengembalian</span>
        </div>

        @include('partials.toast-success')
        @include('partials.toast-error')

        <form method="POST" action="{{ route('kepala-unit.pengembalian.approval.submit', $pengembalian->id) }}"
            class="p-4">
            @csrf

            {{-- <input type="hidden" name="peminjaman_id" value="{{ $pengembalian->peminjaman->id ?? '' }}"> --}}

            {{-- Baris 1: Nama Peminjam & Tujuan --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label">Nama Peminjam</label>
                    <input type="text" name="user_id" id="user_id" class="form-control"
                        value="{{ $pengembalian->peminjaman->user->username }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control"
                        value="{{ $pengembalian->peminjaman->tujuan ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 2: Tanggal Peminjaman & Mobil --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="text" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
                        value="{{ $pengembalian->peminjaman->tanggal_peminjaman->format('Y-m-d') ?? '' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobil" class="form-label">Mobil</label>
                    <input type="text" name="mobil" id="mobil" class="form-control"
                        value="{{ $pengembalian->peminjaman->mobil->merek->nama ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 3: Tanggal Kembali & Lokasi Parkir --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="text" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control"
                        value="{{ $pengembalian->peminjaman->tanggal_pengembalian->format('Y-m-d') ?? 'Tidak di isi' }}"
                        disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lokasi_id" class="form-label">Lokasi Parkir</label>
                    <input type="text" name="lokasi_id" id="lokasi_id" class="form-control"
                        value="{{ $pengembalian->peminjaman->lokasiPeminjaman->lokasi ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 4: Jam Pinjam & Jam Kembali --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jam_peminjaman" class="form-label">Jam Peminjaman</label>
                            <input type="text" name="jam_peminjaman" id="jam_peminjaman" class="form-control"
                                value="{{ $pengembalian->peminjaman->jam_peminjaman ?? '' }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jam_pengembalian" class="form-label">Jam Pengembalian</label>
                            <input type="text" name="jam_pengembalian" id="jam_pengembalian" class="form-control"
                                value="{{ $pengembalian->peminjaman->jam_pengembalian ?? 'Tidak di isi' }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kepemilikan_sim" class="form-label">Memenuhi Syarat SIM</label>
                    <input type="text" name="kepemilikan_sim" id="kepemilikan_sim" class="form-control"
                        value="{{ isset($pengembalian->peminjaman) ? ($pengembalian->peminjaman->kepemilikan_sim ? 'Iya' : 'Tidak') : '' }}"
                        disabled>
                </div>
            </div>

            {{-- Baris 5: SIM & Kondisi Sebelum --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sebelum" class="form-label">Kondisi Sebelum</label>
                    <input type="text" name="kondisi_sebelum" id="kondisi_sebelum" class="form-control"
                        value="{{ $pengembalian->peminjaman->kondisi_sebelum ?? '' }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kondisi_sesudah" class="form-label">Kondisi Sesudah</label>
                    <input type="text" name="kondisi_sesudah" id="kondisi_sesudah" class="form-control"
                        value="{{ $pengembalian->kondisi_sesudah ?? '' }}" disabled>
                </div>
            </div>

            {{-- Baris 6: Catatan & Approval --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="catatan_pengembalian" class="form-label">Catatan Kepala Unit</label>
                    <input name="catatan_pengembalian" id="catatan_pengembalian" class="form-control"
                        value="{{ $pengembalian->catatan_pengembalian ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alasan_peminjaman" class="form-label">Keterangan</label>
                    <textarea name="alasan_peminjaman" id="alasan_peminjaman" class="form-control" rows="3" disabled>{{ $pengembalian->peminjaman->alasan_peminjaman ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Approval</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Disetujui"
                            {{ (old('status') ?? ($pengembalian->status ?? '')) === 'Disetujui' ? 'selected' : '' }}>
                            Disetujui
                        </option>
                        <option value="Ditolak"
                            {{ (old('status') ?? ($pengembalian->status ?? '')) === 'Ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                    </select>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end">
                <a href="{{ route('kepala-unit.pengembalian.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </div>
        </form>
    </div>
@endsection
