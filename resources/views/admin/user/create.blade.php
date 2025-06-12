@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
    <div class="container p-0 rounded mt-5 shadow p-3 border border-light border-1">
        <div class="bg-light border border-2 border-gray mb-2 px-2 py-3">
            <p class="text-primary">Menambahkan User</p>
        </div>
        @include('partials.toast-success')
        @include('partials.toast-error')

        <form action="{{ route('admin.store-user') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="foto_profile" class="form-label">Upload Foto Profile</label>
                    <input type="file" accept=".jpeg,.jpg,.png,.gif,.svg" name="foto_profile" id="foto_profile"
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $listJurusan)
                            <option value={{ $listJurusan->id }}>{{ $listJurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="prodi_id">Prodi</label>
                    <select name="prodi_id" id="prodi_id" class="form-select" required>
                        <option value="">-- Pilih Prodi --</option>
                        @foreach ($prodi as $listProdi)
                            <option value={{ $listProdi->id }}>{{ $listProdi->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="kepala_unit">Kepala Unit</option>
                        <option value="pegawai">Pegawai</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label mt-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        required>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toastEl = document.querySelector('.toast');
                if (toastEl) {
                    new bootstrap.Toast(toastEl).show();
                }
                @if (session('success'))
                    document.querySelector('form').reset();
                @endif
            });
        </script>
    @endpush
@endsection
